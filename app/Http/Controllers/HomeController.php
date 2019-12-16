<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
    	$location_data = DB::table('location_data')->get();
		$users = DB::table('users')->select("username as nama")->get();
		foreach($users as $u){
			$u->nama;
		}
    	return view('index',['location_data' => $location_data, 'users' => $users]);
    }
    
    public function about()
    {
    	$location_data = DB::table('location_data')->get();
		$users = DB::table('users')->get();
    	return view('about',['location_data' => $location_data, 'users' => $users]);
	}
}
