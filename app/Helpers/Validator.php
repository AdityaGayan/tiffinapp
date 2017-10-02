<?php

namespace App\Helpers;

use App\OneTimePassword as OTP;
use App\OtpBlacklist;

/**
 * OTP validaty checker.
 */
class Validator
{
    /**
     * Check if the given OTP is valid.
     *
     * @param string $otp
     * @param string $module
     * @param string $id
     *
     * @return boolean
     */
    public function isValid($otp, $mobile, $id)
    {
        (new OTP)->removeExpiredTokens();

        if ($this->isBlocked($mobile, $id)) {
            return false;
        }

        $otp = OTP::where('token', $otp)
            ->where('mobile', $mobile)
            ->where('user_id', $id)
            ->first();

        if (!$otp) {
            return false;
        }

        return true;
    }

    /**
     * Check if the module + id has been blacklisted.
     *
     * @param string $module
     * @param string $id
     *
     * @return boolean
     */
    public function isBlocked($module, $id)
    {
        $blocked = OtpBlacklist::whereMobile($module)
            ->whereUserId($id)
            ->first();

        return $blocked ? true : false;
    }

    /**
     * Get number of trials made to generate OTP.
     *
     * @param string $module
     * @param string $id
     *
     * @return int
     */
    public function getTrials($module, $id)
    {
        return (new OTP)->getTrialsCount($module, $id);
    }
}
