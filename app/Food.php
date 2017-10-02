<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Food extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','description','LD', 'dailyprice', 'weeklyprice', 'monthlyprice',
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
     


