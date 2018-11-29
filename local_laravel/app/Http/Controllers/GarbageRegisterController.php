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
		$type = $request->input('type');
		$capacity = $request->input('capacity');
		$bin = new garbage_bin_register;
		$bin->type = $type;
		$bin->capacity = $capacity;
		$bin->save();
		return $this->retrieve();
	}
}