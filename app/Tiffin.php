<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tiffin extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'BLD', 'bookingid', 'customerid','quantity','date','status','typemeal','charges',
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
     


