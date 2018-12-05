<?php
namespace app\Http\Controllers;
use App\garbage_bin_register;

trait GarbageTrait
{
	public function retrieve()
	{
		$bin = garbage_bin_register::all();
		return view('garbage_bin_table',['bin'=>$bin]);
	}
	
	
}
?>