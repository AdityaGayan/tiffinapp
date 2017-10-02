<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\Manager;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;

class msg extends Controller
{
    /* Function to verify OTP.
    *
    * @return Response
    */
    public function verifyaccount(Request $request){


        $response = array();

        $mobile=$request->input('mobile');
        $otp = $request->input('otp');

        $user = User::where('mobile',$mobile)->first();
        $userid=$user->id;

        $manager=new Manager;
        $result=$manager->isValid($otp,$mobile,$userid);

        if($result)
        {
            User::where('id', $userid)->update(['isVerified' => 1]);
            $response['error'] = 0;
            $response['isVerified'] = 1;
            $response['message'] = "Your Number is Verified.";
        }
        else
        {
            $response['error'] = 1;
            $response['isVerified'] = 0;
            $response['message'] = "OTP does not match.";
        }
        return response()->json(['results',$response]);
    }

    /**
     * Send a OTP to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getotp(Request $request)
    {
        $mobile=$request->input('mobile');
        // dd($mobile);
        $this->validate($request, ['mobile' => 'required']);
        $user = User::where('mobile', $request->input('mobile'))->first();

        if ($request->wantsJson()) {
            if (!$user) {
                $msg['message']='Please check your valid mobile number again';
                $msg['success']='0';
                return response()->json(['results'=>$msg], 400);
            }
        
        //create OTP
        $manager=new Manager;
        $otp=$manager->generate($mobile, $user->id);

        //send OTP
        $message="Hello ".$user->name.", ".$otp->token." is your OTP for TIFFIN APP verification. It is valid for 10 minutes.";
        //$msg['msgstatus'] = LaravelMsg91::message($mobile, $message);

        $msg['otp']=$otp;
        $msg['success']='1'; 

        return response()->json(['results' => $msg],400);
        
        }//if ends
    }
       
    
}
