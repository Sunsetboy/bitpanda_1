<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    /**
     * Get UserDetails record associated with user
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function details()
    {
        return $this->hasOne(UserDetails::class);
    }

    /**
     * Returns a country of the user
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function country()
    {
        return $this->hasOneThrough(
            Country::class,
            UserDetails::class,
            'user_id',
            'citizenship_country_id'
        );
    }
}
