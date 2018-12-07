<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class chartController extends Controller
{
    public function create()
	{
		$bins = DB::table('garbage_bin_register')->get();
		return view('chart',['bins'=>$bins]);
	}
}
