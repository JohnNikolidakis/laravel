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
		$name = $request->input('name');
		$max_capacity = $request->input('max_capacity');
		$cur_capacity = $request->input('cur_capacity');
		$bin = new garbage_bin_register;
		$bin->max_capacity = $max_capacity;
		$bin->cur_capacity = $cur_capacity;
		$bin->name = $name;
		$bin->save();
		return $this->retrieve();
	}
	
	public function mainpage()
	{
		$bins = garbage_bin_register::all();
		return view('welcome',['bins'=>$bins]);
	}
	
	public function search(Request $request)
	{
		$search = $request->input('search');
		$result = DB::table('garbage_bin_register')->select(DB::raw("*"))->where('name', 'LIKE', "%{$search}%")->get();
		return view('garbage_bin_table',['bin'=>$result]);
	}
	
	public function edit(Request $request)
	{
		$name = $request->input('name');
		(is_null($request->input('new_name'))) ? $new_name = $name : $new_name = $request->input('new_name');
		$max_capacity = $request->input('max_capacity');
		$cur_capacity = $request->input('cur_capacity');
		$result = DB::table('garbage_bin_register')->select(DB::raw("*"))->where('name', '=', $name)->get();
		if(empty($result))
		{
			return view('garbage_bin_register');
		}
		else
		{
			if(is_null($max_capacity))
				$res = DB::table('garbage_bin_register')->where('name',$name)->update(['name'=>$new_name, 'cur_capacity'=>$cur_capacity]);
			else
				$res = DB::table('garbage_bin_register')->where('name',$name)->update(['name'=>$new_name, 'max_capacity'=>$max_capacity, 'cur_capacity'=>$cur_capacity]);
			return $this->retrieve();
		}
	}
	
	public function registerEdit(Request $request)
    {
		$name = $request->input('name');
		$max_capacity = $request->input('max_capacity');
		$cur_capacity = $request->input('cur_capacity');
		$edit['edit']=[$name,$max_capacity,$cur_capacity];
		return view('garbage_bin_register_edit',['name'=>$name, 'max_capacity'=>$max_capacity, 'cur_capacity'=>$cur_capacity]);
	}
	
	public function post(Request $request)
	{
		$bins = $request->data;
		return view('garbage_bin_register_edit',['bins'=>$bins]);
	}
}