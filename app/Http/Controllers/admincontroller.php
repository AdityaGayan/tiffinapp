<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Food;
use App\User;
use Illuminate\Http\Request;
use App\authacesstoken;
use DB;


class admincontroller extends Controller
{
    public function verifyadmin(Request $request){

           //validate data
           $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $username=$request->input('username');
        $password=$request->input('password');
        if($userdata=DB::table('adminlogin')->where('username',$username)->first()){
            if($userdata->password==$password)
            {
                return response()->json(['success'=>'1']);  
            }
            else{
                return response()->json(['success'=>'0']);            
            
            }
        }
        else{
            return response()->json(['success'=>'0']); 
        }
       


    }



    public function showbookings(Request $request){
        $bookings=DB::table('bookings')->get();
        return response()->json([
            'bookings'=>$bookings,
            
        ]);
    }

    public function showtiffins(Request $request){
        $tiffins=DB::table('tiffin')->get();
        return response()->json([
            'tiffins'=>$tiffins,
            
        ]);
    }


    public function showusers(){
        $users=DB::table('users')->get();
        return response()->json([
            'users'=>$users,
        ]);
    }


    public function createfood(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'LD' => 'required',
            'dailyprice'=>'required',
            'weeklyprice' => 'required',
            'monthlyprice' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();

        //create user 
        $food = food::create($input);
        $name= $food->name;

        $starters=$request->input('starters');
        $thali=$request->input('thali');
        $chapppati=$request->input('chappati');
        $vegitable=$request->input('vegitable');
        $salad=$request->input('salad&pickle');
        $desert=$request->input('desert');
        $complementary=$request->input('complementary');
        DB::table('foods')->where('name',$name)->update(["starters"=>$starters]);
        DB::table('foods')->where('name',$name)->update(["thali"=>$thali]);
        DB::table('foods')->where('name',$name)->update(["chappati"=>$chapppati]);
        DB::table('foods')->where('name',$name)->update(["vegetable"=>$vegitable]);
        DB::table('foods')->where('name',$name)->update(["salad&pickle"=>$salad]);
        DB::table('foods')->where('name',$name)->update(["desert"=>$desert]);
        DB::table('foods')->where('name',$name)->update(["complementary"=>$complementary]);
        
        
        if($fooddetails=DB::table('foods')->where('name',$name)->first()){
                return response()->json(['success'=>'1']);  
            }
            else{
                return response()->json(['success'=>'0']);            
            
            }
        }
        
       
       
    


    

        //updatetiffins
        public function updatefood(Request $request)
        {
            //validate data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'LD' => 'required',
            'dailyprice'=>'required',
            'weeklyprice' => 'required',
            'monthlyprice' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }


            $foodid=$request->input('foodid');
            $name=$request->input('name');
            $description=$request->input('description');
            $LD=$request->input('LD');
            $starters=$request->input('starters');
            $thali=$request->input('thali');
            $chapppati=$request->input('chappati');
            $vegetable=$request->input('vegetable');
            $salad=$request->input('salad&pickle');
            $desert=$request->input('desert');
            $complementary=$request->input('complementary');
            $dailyprice=$request->input('dailyprice');
            $weeklyprice=$request->input('weeklyprice');
            $monthlyprice=$request->input('monthlyprice');

            $food=DB::table('foods')->where('foodid',$foodid)->first();
            
        
        DB::table('foods')->where('foodid',$foodid)->update(["name"=>$name]);
        DB::table('foods')->where('foodid',$foodid)->update(["description"=>$description]);
        DB::table('foods')->where('foodid',$foodid)->update(["LD"=>$LD]);
        DB::table('foods')->where('foodid',$foodid)->update(["starters"=>$starters]);
        DB::table('foods')->where('foodid',$foodid)->update(["thali"=>$thali]);
        DB::table('foods')->where('foodid',$foodid)->update(["chappati"=>$chapppati]);
        DB::table('foods')->where('foodid',$foodid)->update(["vegetable"=>$vegetable]);
        DB::table('foods')->where('foodid',$foodid)->update(["salad&pickle"=>$salad]);
        DB::table('foods')->where('foodid',$foodid)->update(["desert"=>$desert]);
        DB::table('foods')->where('foodid',$foodid)->update(["complementary"=>$complementary]);
        DB::table('foods')->where('foodid',$foodid)->update(["dailyprice"=>$dailyprice]);
        DB::table('foods')->where('foodid',$foodid)->update(["weeklyprice"=>$weeklyprice]);
        DB::table('foods')->where('foodid',$foodid)->update(["monthlyprice"=>$monthlyprice]);
        

        if($fooddetails=DB::table('foods')->where('name',$name)->first()){
            return response()->json(['success'=>'1']);  
        }
        else{
            return response()->json(['success'=>'0']);            
        
        }
    
        
    }



    //updatetiffins
    public function updateuser(Request $request)
    {
        //validate data
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'mobile' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()], 401);            
    }


        $id=$request->input('id');
        $name=$request->input('name');
        $email=$request->input('email');
        $mobile=$request->input('mobile');
        $isVerified=$request->input('isVerified');

        $food=DB::table('users')->where('id',$id)->first();
        
    
    DB::table('users')->where('id',$id)->update(["name"=>$name]);
    DB::table('users')->where('id',$id)->update(["email"=>$email]);
    DB::table('users')->where('id',$id)->update(["mobile"=>$mobile]);
    DB::table('users')->where('id',$id)->update(["isVerified"=>$isVerified]);
    

    if($fooddetails=DB::table('users')->where('id',$id)->first()){
        return response()->json(['success'=>'1']);  
    }
    else{
        return response()->json(['success'=>'0']);            
    
    }

    
}






//updatetiffins
public function updatebooking(Request $request)
{
    //validate data
$validator = Validator::make($request->all(), [
    'name' => 'required',
    'address' => 'required',
    'usermobile' => 'required',
    'deliverymobile' => 'required',

]);

if ($validator->fails()) {
    return response()->json(['error'=>$validator->errors()], 401);            
}


    $bookingid=$request->input('bookingid');
    $name=$request->input('name');
    $address=$request->input('address');
    $usermobile=$request->input('usermobile');
    $deliverymobile=$request->input('deliverymobile');

    $food=DB::table('bookings')->where('bookingid',$bookingid)->first();
    

DB::table('bookings')->where('bookingid',$bookingid)->update(["name"=>$name]);
DB::table('bookings')->where('bookingid',$bookingid)->update(["address"=>$address]);
DB::table('bookings')->where('bookingid',$bookingid)->update(["usermobile"=>$usermobile]);
DB::table('bookings')->where('bookingid',$bookingid)->update(["deliverymobile"=>$deliverymobile]);


if($bookingdetails=DB::table('bookings')->where('bookingid',$bookingid)->first()){
    return response()->json(['success'=>'1']);  
}
else{
    return response()->json(['success'=>'0']);            

}


}

    //delete food
    public function deletefood(Request $request)
    {
        $foodid=$request->input('foodid');
        DB::table('foods')->where('foodid',$foodid)->delete();
        if($fooddetails=DB::table('foods')->where('foodid',$foodid)->first()){
            return response()->json(['success'=>'1']);  
        }
        else{
            return response()->json(['success'=>'0']);            
        
        }
    }

    //delete user
    public function deleteuser(Request $request)
    {
        $id=$request->input('id');
        DB::table('users')->where('id',$id)->delete();
        if($userdetails=DB::table('users')->where('id',$id)->first()){
            return response()->json(['success'=>'1']);  
        }
        else{
            return response()->json(['success'=>'0']);            
        
        }
    }





    public function showuserbookings(Request $request){
        $userid=Request('id');
        // $userid=$request->input('userid');
        $user=DB::table('users')->where('id',$userid)->first();
        $name=$user->name;
        $bookings=DB::table('bookings')->where('name',$name)->get();
        return response()->json([
            'bookings'=>$bookings,
            
        ]);
    }

    public function showusertiffins(Request $request){
        $bookingid=Request('bookingid');
        $userid=Request('id');
        $tiffins=DB::table('tiffin')->where('customerid',$userid)->where('bookingid',$bookingid)->get();
        return response()->json([
            'tiffins'=>$tiffins,
        ]);
    }

    public function showtiffinson(Request $request){
        $y = Request('date');
        $tiffins=DB::table('tiffin')->where('date',$y)->get();
        return response()->json([
            'tiffins'=>$tiffins,
        ]);
    }


    public function showfoodtiffinson(Request $request){
        $foodname=Request('foodname');
        $date=Request('date');
        $tiffins=DB::table('tiffin')->where('date',$date)->where('typemeal',"Veg Value Meal")->get();
        return response()->json([
            'tiffins'=>$tiffins,
        ]);
    }
        


//create user
public function createuser(Request $request)
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
    $input['isVerified']=1;

    //create user 
    $user = User::create($input);


    
    $mobile= $user->mobile;
    if($userdetails=DB::table('users')->where('mobile',$mobile)->first()){
        return response()->json(['success'=>'1']);  
    }
    else{
        return response()->json(['success'=>'0']);            
    
    }
}
}

