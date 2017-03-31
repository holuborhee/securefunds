<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    //
	protected $guarded = [];
	public $timestamps = false;
	public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->added_on = $model->freshTimestamp();
        });
    }
	/**
     * Get the user that owns the deal.
     */
	public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category that owns the deal.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    /**
     * Get the matches for the deal.
     */
    public function matches()
    {
        return $this->hasMany('App\Match');
    }

    

}
