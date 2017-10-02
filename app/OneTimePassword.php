<?php

namespace App;

use Carbon\Carbon;
use Config;
use Illuminate\Database\Eloquent\Model;

class OneTimePassword extends Model
{
    protected $table = 'one_time_passwords';
    protected $dates = ['created_at', 'updated_at'];

    public function removeExpiredTokens()
    {
        OneTimePassword::where('expires_on', '<=', Carbon::now())->delete();

        return true;
    }

    public function generate($module, $id, $length)
    {
        $this->removeExpiredTokens();

        $min = str_pad(1, $length, 0);
        $max = str_pad(9, $length, 9);

        $this->token = random_int($min, $max);
        $this->mobile = $module;
        $this->user_id = $id;
        $this->expires_on = Carbon::now()->addMinutes(Config::get('otp.expiry'));
        $this->save();

        return $this;
    }

    public function getTrialsCount($module, $id)
    {
        $trials = OneTimePassword::whereMobile($module)
            ->whereUserId($id)
            ->count();
    }
}
