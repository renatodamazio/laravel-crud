<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	
    //
    public function index() {
    	
    	$users = User::orderBy('id', 'desc')->paginate(5);
    	return view('users.index', ['users' => $users, 'pagination' => true]);

    }


    public function create() {
    	return view('users.create');
    }

    public function edit(int $id) {
    	$user = User::find($id);
    	return view('users.edit', ['user' => $user]);
    }

     public function save(UserRequest $request) {

        $validated = $request->validated();


    	$user = new User();

    	$user->email = $request->email;
    	$user->name = $request->name;
    	$user->cpf = $request->cpf;
    	$user->password = Hash::make($request->password);
    	$user->birthday = new Carbon($request->birthday);
    	$user->image = $request->image;
    	
    	$user->save();

    	return redirect(route('users.index'));

    }

    public function profile(int $id) {
    	$user = User::find($id);
    	return view('users.profile', ['user'=>$user]);
    }

    public function update(UserRequest $request, $id) {

       $validated = $request->validated();

    	$user = User::find($id);
    	
    	$user->name = $request->name;
    	$user->cpf = $request->cpf;
    	if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
    	
        $user->email = $request->email;
        $user->birthday = $request->birthday;
    	$user->image = $request->image;
    	
    	$user->save();

        return redirect(route('users.index'));

    }

    public function find(Request $request) {

        $q = $request->q;


        $users = User::where('name','like', '%'.$q.'%')->orWhere('cpf','like', '%'.$q.'%')->paginate(5);
        $users->appends(['q' => $q]);

        return view('users.index', ['users' => $users, "pagination" => true, "q" => $q]);

    }
    
    public function delete($id) {
  
        $user = User::find($id);
    	$user->delete();

        return redirect(route('users.index'));

    }
}
