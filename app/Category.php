<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
	/**
     * Get the deals for the category.
     */
    public function deals()
    {
        return $this->hasMany('App\Deal');
    }

    /**
     * Get the users for the category.
     */
    public function users()
    {
        return $this->hasMany('App\User')->withTrashed();
    }

    public function getAmountAttribute($value)
    {
        return number_format($value);
    }
}
