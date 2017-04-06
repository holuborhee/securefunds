<?php

namespace App\Console;

use App\User;
use App\Match;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\Inspire',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            foreach(Match::whereNull('cannot_pay')->cursor()->whereNull('url') as $match){
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
        })->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
