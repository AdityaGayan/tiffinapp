<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtpBlacklist extends Model
{
    protected $table = 'otp_blacklists';
    protected $dates = ['created_at', 'updated_at'];
}
