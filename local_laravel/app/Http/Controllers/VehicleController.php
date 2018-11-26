<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
	public function create()
	{
		return view('vehicle_register');
	}
	
	public function store(Request $request)
    {
		$licence = $request->input('licence');
		$liters = $request->input('liters');
		/*DB::table('vehicle_register')->insert(['licence' => $licence,
											   'liters' =>$liters
											  ]);*/
		return $this->retrieve();
	}
	
	public function retrieve()
	{
		$vehicle = DB::table('vehicle_register')->get();
		return view('vehicletable',['vehicles'=>$vehicle]);
	}
}
