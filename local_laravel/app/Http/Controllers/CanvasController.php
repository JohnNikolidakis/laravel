<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CanvasController extends Controller
{
    public function create()
	{
		$result = DB::table('garbage_bin_register')->get();
		return view('canvas',['bins'=>$result]);
	}
}
