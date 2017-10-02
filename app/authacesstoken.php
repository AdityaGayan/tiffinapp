<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class authacesstoken extends Model
{
     protected $fillable = [
        'token', 'user_id', 'mobile','token_id'
    ];
}
