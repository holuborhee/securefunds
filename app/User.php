<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName(){
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * Get the deals for the user.
     */
    public function deals()
    {
        return $this->hasMany('App\Deal');
    }

    /**
     * Get the matches for the user.
     */
    public function matches()
    {
        return $this->hasMany('App\Match');
    }


    /**
     * Get the category that owns the user.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public static function getCategoryCount($cat){

        $deals = Deal::where('category_id',$cat)->get();
        return $deals->count();
    }

    public function isToDonate(){
        $match = $this->matches()->where('confirmed_on',NULL)->get();
        return $match->count();
    }

    public function isActiveTransactionOrDonation(){
        return $this->isToRecieve() OR $this->isToDonate();
    }

    public function isToRecieve(){
        $deal = $this->deals()->where('closed_on',NULL)->get();
        return $deal->count();
    }

    

   
}
