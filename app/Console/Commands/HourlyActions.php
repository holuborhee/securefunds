<?php

namespace App\Console\Commands;

use App\User;
use App\Match;
use Illuminate\Console\Command;

class HourlyActions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hourly:actions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Executing hourly actions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach(Match::whereNull('cannot_pay')->whereNull('url')->cursor() as $match){
                if(time() > strtotime($match->getExpiredDate()))
                {
                    $match->cannot_pay = 1;
                    $match->save();

                    $user = User::findOrFail($match->user_id);
                    $user->delete();
                }
            }

            foreach(Match::where('cannot_pay',1)->cursor() as $m){
                $match = Match::findOrFail($m->id);
                $match->delete();
            }

            foreach(User::whereNotNull('category_id')->oldest('request_on')->cursor() as $user){
                $match = Match::doMatching($user->category_id,$user->id);
                if($match){
                    $user = User::findOrFail($user->id);
                    $user->category_id = NULL;
                    $user->request_on = NULL;
                    $user->save();
                }
            }
    }
}
