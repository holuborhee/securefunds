<?php

namespace App;

use App\User;
use App\Deal;
use DB;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //


    protected $guarded = [];
    public $timestamps = false;
    public $expired_on = "";


    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->matched_on = $model->freshTimestamp();
        });
    }

    public function __construct(){
        $d = (new \DateTime($this->matched_on))->modify('+1 day');
        $this->expired_on = $d->format('Y-m-d H:i:s');
    }


	/**
     * Get the user that owns the match.
     */
	public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the deal that owns the match.
     */
    public function deal()
    {
        return $this->belongsTo('App\Deal');
    }


    public static function doMatching($cat,$id){
    	if(self::canMatch($cat)){
    		//Do mathing, get the deal to match to and do the matching;

            
    		if(sizeof(self::getNextDeal($cat,$id)) === 1)
    		{
    			$deal = self::getNextDeal($cat,$id);
                $deal = $deal[0];
                $deal = Deal::findOrFail($deal->id);
    			$deal->matches()->create(['user_id'=>$id]);
    			return true;
    		}
            else{
                echo "sds";
                dd(self::getNextDeal($cat,$id));
            }

    	}

    	return false;
    }

    //Decides if a user can be matched based on the day of the week and the position in category
    static function canMatch($cat)
    {
    	if(User::getCategoryCount($cat) > 9)
    		if(!self::isWeekend(time()))
    			return true;
    		else
    			return false;
    	else
    		return false;
  
    }

    //Check if the current timestamp falls on weekend friday-Sunday
    static function isWeekend($date) {
    	return (date('N', $date) >= 5);
	}

	protected static function getNextDeal($cat,$id){
		// search for the right deal and return it
		$query = "SELECT * FROM deals WHERE (id IN (SELECT deal_id FROM matches GROUP BY deal_id HAVING COUNT(deal_id) < 2)  OR id NOT IN (SELECT deal_id FROM matches)) AND category_id = :cat AND user_id != :user AND closed_on IS NULL ORDER BY added_on LIMIT 1";
		$res = DB::select($query, ['cat' => $cat, 'user' => $id]);
        //dd($res);
		return $res;
	}
}
