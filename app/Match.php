<?php

namespace App;

use App\User;
use App\Deal;
use DB;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['user_id', 'deal_id'];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->matched_on = $model->freshTimestamp();
        });
    }

    public function getExpiredDate(){
        $d = date('Y-M-d H:i:s', strtotime("{$this->matched_on} + 24 hours"));
        return $d;
    }

    public function getCannotPayAttribute($value){
        if($value === 1)
            return true;
    }


	/**
     * Get the user that owns the match.
     */
	public function user()
    {
        return $this->belongsTo('App\User')->withTrashed();
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
                /*echo "Deal id: {$deal->id}, User id: {$id}, Category Id: {$cat}";
                exit();*/
                /*$match = new Match;
                $match->user_id = $id;
                $match->deal_id = $deal->id;
                $match->matched_on = $match->freshTimestamp();
                $match->save();*/
                $deal->matches()->create(['user_id'=>$id]);
    			return true;
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
		$query = "SELECT * FROM deals WHERE (id IN (SELECT deal_id FROM matches GROUP BY deal_id HAVING COUNT(deal_id) < 2)  OR id NOT IN (SELECT deal_id FROM matches)) AND category_id = :cat AND user_id != :user AND closed_on IS NULL ORDER BY added_on, id LIMIT 1";
		$res = DB::select($query, ['cat' => $cat, 'user' => $id]);
        //dd($res);
		return $res;
	}
}
