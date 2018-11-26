<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller
{
	public function create()
	{
		return view('register');
	}
	
    public function store(Request $request)
    {
		$firstname = $request->input('firstname');
		$lastname = $request->input('lastname');
		$password = $request->input('password');
		$email = $request->input('email');
		$phonenumber = $request->input('phonenumber');
		$city = $request->input('city');
		$address = $request->input('address');
		$zip = $request->input('zip');
		DB::table('users')->insert(['firstname' => $firstname,
									'lastname' =>$lastname,
									'password' => $password,
									'email' => $email,
									'phonenumber' => $phonenumber,
									'city' => $city,
									'address' => $address,
									'zipcode' => $zip]);
		return $this->retrieve();
	}
	
	public function retrieve()
	{
		$users = DB::table('users')->get();
		return view('table',['users'=>$users]);
	}
}
