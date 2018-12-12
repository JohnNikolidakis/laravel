<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class chartController extends Controller
{
    public function create()
	{
		return view('chart');
	}
	
	public function chart(Request $request)
	{
		if($request->message === 'asc')
			$bins = DB::table('garbage_bin_register')->orderBy('name', 'asc')->get();
		else
			$bins = DB::table('garbage_bin_register')->orderBy('name', 'desc')->get();
		return response()->json($bins);
	}
}
