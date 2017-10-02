<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use Illuminate\Http\Request;
use App\authacesstoken;
use LaravelMsg91;
use App\Helpers\Manager;
use DB;

class usercontroller extends Controller
{
    public $successStatus = 200;

    public function register(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'mobile'=>'required|unique:users'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['isVerified']=0;

        //create user 
        $user = User::create($input);

        //create OTP
        $manager=new Manager;
        $otp=$manager->generate($input['mobile'], $user->id);

        $message="Hello ".$user->name.", ".$otp->token." is your OTP for TIFFIN APP verification. It is valid for 10 minutes.";
        
        //send OTP
        //$result = LaravelMsg91::message($input['mobile'], $message);
        $result="message not sent try";
        
        //response in api
        return response()->json([
                 'id'=>$otp->id,
                 'otp' => $otp->token,
                 'mobile'=>$otp->mobile,
                 'user_id'=>$user->id,
                 'isVerified'=>$user->isVerified,
                 'msg_ststus'=>$result,
                 'message'=>'Please verify your account',
             ]);
    }

    /**
    * Function for Login.
    *
    * @return Response
    */
    public function login(Request $request){
       
        $mobile = $request->input('mobile');
        $password = $request->input('password');

        

        if (Auth::attempt([ 'mobile'=> $mobile, 'password'  => $password ])) {
            $user = Auth::user();

            $status=$user->where(['isVerified'=>'1','mobile'=>$mobile])->first();

            if($status){
                $access =  $user->createToken('Tiffinapp');

                
                $data=array();

                $data['user_id']=$access->token->user_id;
                $data['mobile']=$user->mobile;
                $data['token']=$access->accessToken;
                $data['success']='1';
                
                authacesstoken::create($data);
                $success['token']=$access;
                return response()->json(['results' => $data], $this->successStatus);
            }
            else
            {
                $msg['success']='0';
                $msg['message']='Please login after verifying your account';
                return response()->json(['results' => $msg], 400);
            }
        }
        else{
            $msg['success']='0';
            $msg['message']='please input your correct credential again';
            return response()->json(['results'=>$msg], 401);
        }
    }


    /*
        logout api
    */    
    
    public function logout(Request $request)
    { 
         $token=$request->input('token');
         $usersession1=Auth::user()->authacesstoken()->where('token',$token)->first();
         $token_id=$usersession1->token_id;
         
         $usersession1->delete(); 
        
         $usersession2=DB::table('oauth_access_tokens')->where('id',$token_id);
         $usersession2->delete();
        
         $say['message']='You have been sucessfully logged out';
         $say['success']='1';
         return response()->json(['results'=>$say],$this->successStatus);
    }

    /*
        Reset Password
    */
    public function resetpassword(Request $request)
    {
        $response = array();

        $mobile=$request->input('mobile');
        $newpassword=$request->input('newpassword');
        $otp = $request->input('otp');

        $this->validate($request, [
            'mobile' => 'required',
            'newpassword'=>'required|confirmed',
            'otp'=>'required'
        ]);

        $user = User::where('mobile',$mobile)->first();
        $userid=$user->id;

        $manager=new Manager;
        $result=$manager->isValid($otp,$mobile,$userid);

        if($result)
        {
            $newpassword= bcrypt($newpassword);

            User::where('id', $userid)->update(['password' => $newpassword]);
            $response['error'] = 0;
            $response['message'] = "Your Password has been reset.";
        }
        else
        {
            $response['error'] = 1;
            $response['message'] = "OTP does not match.";
        }
        return response()->json(['results'=>$response],400);
    }
}
