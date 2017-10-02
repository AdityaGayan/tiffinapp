<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class booking extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'L','D','name', 'address', 'usermobile','deliverymobile', 'bookingoption','starting_date','last_date','no_of_subscriptions',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function authacesstoken()
    { 
        return $this->hasMany(authacesstoken::class);
    }
}
     


