<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    public function getCategories()
	{
	   	$client = new \GuzzleHttp\Client();
			$res = $client->request('GET', 'https://private-4639ce-ecommerce56.apiary-mock.com/home', [
			    // 'auth' => ['user', 'pass']
			]);
		
		$body = json_decode($res->getBody());

			return response()->json($body[0]);
	}

	public function postSessionStorage(Request $request)
	{
		$data = $request->all();
		Session::push('cart', $data);
		
		return response()->json("berhasil");
	}


}
