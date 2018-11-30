<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\garbage_bin_register;

class GarbageRegisterController extends Controller
{
	use GarbageTrait;
    public function create()
	{
		return view('garbage_bin_register');
	}

	public function store(Request $request)
    {
		$max_capacity = $request->input('max_capacity');
		$cur_capacity = $request->input('cur_capacity');
		$bin = new garbage_bin_register;
		$bin->max_capacity = $max_capacity;
		$bin->cur_capacity = $cur_capacity;
		$bin->save();
		return $this->retrieve();
	}
	
	public function mainpage()
	{
		$bins = garbage_bin_register::all();
		return view('welcome',['bins'=>$bins]);
	}
}