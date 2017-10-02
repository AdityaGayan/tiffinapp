<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\booking;
use App\User;
use Illuminate\Http\Request;
use App\authacesstoken;
use DB;


class foodcontroller extends Controller
{
    public function food()
    {
    	$food=DB::table('foods')->get();
    	return response()->json(['results'=>$food]);
    }

    public function lunch()
    {
    	$food=DB::table('foods')->where('LD','L')->get();
    	return response()->json(['results'=>$food]);
    }
    
    public function dinner()
    {
    	$food=DB::table('foods')->where('LD','D')->get();
    	return response()->json(['results'=>$food]);
    }

    //booking option
    public function bookingoption()
    {
        $bookingoption=DB::table('booking_option')->get();
    	return response()->json(['results'=>$bookingoption]);
    }

    //create booking
    public function  createbooking(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'L' => 'required',
            'D' => 'required',
            'name' => 'required',
            'address' => 'required',
            'usermobile' => 'required',
            'deliverymobile' => 'required',
            'bookingoption' => 'required',
            'starting_date'=>'required',
            'no_of_subscriptions'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        //create booking 
        $createbooking = booking::create($input);
        //getting user details
        $booking=DB::table('bookings')->where('usermobile',$createbooking->usermobile)->orderBy('created_at','desc')->first();
        $bookingid=$booking->bookingid;
        $usermobile=$createbooking->usermobile;
        $bookingoption=$createbooking->bookingoption;
        $user=DB::table('users')->where('mobile',$usermobile)->first();
        $curr_date=$createbooking->starting_date;

        if($createbooking->bookingoption=="weekly"){
            $lastdate=strtotime("+6 days",strtotime($curr_date));
            $lastdate=date('Y-m-d',$lastdate);
            DB::table('bookings')->where('bookingid',$bookingid)->update(["last_date"=>$lastdate]);
        }

        if($createbooking->bookingoption=="monthly"){
            $lastdate=strtotime("+29 days",strtotime($curr_date));
            $lastdate=date('Y-m-d',$lastdate);
            DB::table('bookings')->where('bookingid',$bookingid)->update(["last_date"=>$lastdate]);
        }

        
        //weekly
        if($createbooking->bookingoption=="weekly")
        {
            for($i=0;$i<7;$i++){
                DB::table('tiffin')->insert(array(
                array("L"=>"$createbooking->L",
                  "D"=>"$createbooking->D",
                  "bookingid"=>"$bookingid",
                  "customerid"=>"$user->id",
                  "bookingoption"=>"$createbooking->bookingoption",
                  "quantity"=>"$createbooking->no_of_subscriptions",
                  "date"=>"$curr_date",
                  "status"=>"pending",
                  "typemeal"=>"null",
                  "charges"=>"0"
                  )
                )
                );
                $curr_date++;
            }
        }
            //monthly
            if($createbooking->bookingoption=="monthly")
        {
            for($i=0;$i<30;$i++){
                DB::table('tiffin')->insert(array(
                array("L"=>"$createbooking->L",
                  "D"=>"$createbooking->D",
                  "bookingid"=>"$bookingid",
                  "customerid"=>"$user->id",
                  "bookingoption"=>"$createbooking->bookingoption",
                  "quantity"=>"$createbooking->no_of_subscriptions",
                  "date"=>"$curr_date",
                  "status"=>"pending",
                  "typemeal"=>"null",
                  "charges"=>"0"
                  )
                )
                );
                $curr_date++;
            }

        }

        if($orderdetails=DB::table('bookings')->where('bookingid',$bookingid)->first()){
            return response()->json(['success'=>'1']);  
        }
        else{
            return response()->json(['success'=>'0']);            
        
        }

       }
        //viewbooking

        public function viewbooking(Request $request)
        {  
           $usermobile=$request->input('usermobile');
           $viewbooking=DB::table('bookings')->where('usermobile',$usermobile)->get();
    	   return response()->json(['results'=>$viewbooking]);
        }


        //viewtiffins
        public function viewtiffins(Request $request)
        {
            $bookingid = Request('bookingid');
            $viewtiffins=DB::table('tiffin')->where('bookingid',$bookingid)->get();
            return response()->json(['tiffins'=>$viewtiffins]);
        }


        //updatetiffins
        public function updatetiffin(Request $request)
        {
            $bookingid=$request->input('bookingid');
            $tiffinid=$request->input('tiffinid');
            $updatedate=$request->input('date');
            $updatemeal=$request->input('meal');
            
            $tiffin=DB::table('tiffin')->where('bookingid',$bookingid)->where('tiffinid',$tiffinid)->first();
            $forlastdate=DB::table('bookings')->where('bookingid',$bookingid)->first();

            $currentdate=$tiffin->date;
            $lastdate=$forlastdate->last_date;
            $lastdatenew=strtotime("+3 days",strtotime($lastdate));
            $lastdatenew=date('Y-m-d',$lastdatenew);
            
        //update date
            if($updatedate>$lastdate && $updatedate<=$lastdatenew){
                DB::table('tiffin')->where('bookingid',$bookingid)->where('tiffinid',$tiffinid)->update(["date"=>$updatedate]);
                }       
            
            
            else{
                return response()->json(['results'=>"Enter a valid date"]);
            }
            
            
        $food=DB::table('food')->where('name',$updatemeal)->first();
        DB::table('tiffin')->where('bookingid',$bookingid)->where('tiffinid',$tiffinid)->update(["status"=>$updatemeal]);
        DB::table('tiffin')->where('bookingid',$bookingid)->where('tiffinid',$tiffinid)->update(["typemeal"=>$updatemeal]);
        DB::table('tiffin')->where('bookingid',$bookingid)->where('tiffinid',$tiffinid)->update(["charges"=>$food->dailyprice]);
        if(DB::table('tiffin')->where('bookingid',$bookingid)->where('tiffinid',$tiffinid)->first()){
            return response()->json(['success'=>'1']);  
        }
        else{
            return response()->json(['success'=>'0']);            
        
        }
    }
        
}