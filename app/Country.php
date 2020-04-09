<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    public $timestamps = false;

    /**
     * Returns UserDetails records associated with the country
     */
    public function userDetails()
    {
        return $this->hasMany(UserDetails::class, 'citizenship_country_id');
    }
}
