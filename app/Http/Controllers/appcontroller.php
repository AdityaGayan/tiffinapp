<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class appcontroller extends Controller
{
    public function info()
    {
    	$m=DB::table('info');
    	$msg=$m->select('K','V')->get();
        return response()->json(['results'=>$msg]);
    }
}
