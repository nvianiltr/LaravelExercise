<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel; // connect to UserModel;

class UserController extends Controller
{
	/*dependency injection*/
	
	protected $user;

	public function __construct(UserModel $user) {
		$this->user = $user;
	}

    public function register(Request $request) {
    	$user = [
    		"name"		=> $request->name,
    		"email"		=> $request->email,
    		"password" 	=> md5($request->password) // encryption
    	];

 		/* UserModel::save($user); // <- double colon - access globally */
    	
    	$user = $this->user->create($user); // access locally using depedency injection

    	/* ERROR HANDLING */
    	if ($user) {
    		return "Sucessfully created";
    	}
    	else
    		return "Failed";

    	/* PRINTING INPUT DATAS FROM FORM VIEW */
    	/*
	    	echo $request->name;
	    	echo "     ";
	    	echo $request->email;
	    	echo "     ";
	    	echo $request->password;
	    	echo "     ";
	    	return "success";
    	*/
    }

    public function all() {
    	$users = $this->user->all();

    	return view("all")->with('members', $users); // 'members' is variable name with $users values
    }

    public function find($id) {
    	$user = $this->user->find($id);
    	// $user = $this->user->where("id", "=", $id);
    	return $user;
    }
}
