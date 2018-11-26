<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
     public function post(Request $request)
	 {
		if($request->message == "lol")
		{
			 return response('', 500);
		}
		else
		{
			$response = array
			(
				'status' => 'success',
				'msg' => $request->message,
			);
		}
		return response()->json($response); 
	}
}
