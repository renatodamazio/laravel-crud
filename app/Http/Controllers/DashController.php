<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashController extends Controller
{

     public function index(Request $request) {
        
    	$users = User::orderBy('id', 'desc')->take(5)->get();

        $name = $request->user()->name;
        $image = $request->user()->image;
        $email = $request->user()->email;
        $birthday = $request->user()->birthday;
        $id = $request->user()->id;

		$date = Carbon::parse($birthday);
		$birth = $date->format('d/m/Y');

        return view('users.dash', [
        
        	'id' => $id, 
        	'users' => $users, 
        	'userName' => $name, 
        	'userImage' => $image, 
        	'userEmail' => $email, 
        	'userBirthday' => $birth, 
        	'userId' => $id

        ]);

    }
}
