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

 		/* UserModel::create($user); // <- double colon - access globally */

        try 
        { 
            $user = $this->user->create($user); // access locally using depedency injection
            return redirect('/')->with('success', "$user->name has successfully registered.");
        } 
        /* if email address is already registered, it will show an error message (email is an unique key) */
        catch(\Illuminate\Database\QueryException $ex)
        { 
            return redirect('/')->with('fail', "ERROR: Failed to register. Please try again."); 
        }
    	
    }

    /* SHOW ALL USERS */
    public function all() {
    	$users = $this->user->all();
    	return view("all")->with('members', $users); // 'members' is variable name with $users values
    }

    /* SHOW SPECIFIC USER WHERE ID = $id */
    public function find($id) {
    	$user = $this->user->find($id);
    	// $user = $this->user->where("id", "=", $id);
    	return view("viewSpecificUser")->with('user', $user);
    }

    /* DELETE SPECIFIC USER WHERE ID = $id */
    public function delete($id) {
        $user = $this->user->find($id)->delete();
        return $this->all();
    }

    /* OPEN editProfile.blade.php TO EDIT AN USER'S PROFILE WHERE ID = $id */
    public function editProfile($id){
        $user = $this->user->find($id);
        return view("editProfile")->with('user', $user);
    }

    /* UPDATE USER'S PROFILE IN DATABASE */
    public function updateProfile($id){
        $user = $this->user->find($id);
        $user->name = request('name');
        $user->email = request('email');
         try 
        { 
            $user->save();
            return redirect('all')->with('success', "Successfully updated.");
        } 
        /* if email address is already registered, it will show an error message (email is an unique key) */
        catch(\Illuminate\Database\QueryException $ex)
        { 
            return redirect()->back()->with('fail', "ERROR: Failed to update. Please try again."); 
        }
    }

    /* OPEN changePassword.blade.php TO CHANGE USER'S PASSWORD WHERE ID = $id */
    public function changePassword($id){
        $user = $this->user->find($id);
        return view("changePassword")->with('user', $user);
    }

    /* UPDATE USER'S PASSWORD IN DATABASE */
    public function updatePassword($id){
        $user = $this->user->find($id);

        /* PASSWORD CANNOT BE UPDATED IF
        ** 1. THE ENTERED CURRENT PASSWORD IS NOT THE SAME AS THE ONE IN DATABASE 
        ** 2. CURRENT PASSWORD EQUALS TO NEW PASSWORD 
        ** 3. CURRENT PASSWORD NOT EQUALS TO CONFIRM CURRENT PASSWORD 
        */
        if(($user->password != md5(request('oldpw'))) ||
            (request('oldpw') == request('newpw')) || 
            (request('newpw_confirmation') != request('newpw'))) {
            return redirect()->back()->with('fail', "ERROR: Failed to update. Please try again."); 
        }
        else{
            $user->password = md5(request('newpw'));
            $user->save(); // access locally using depedency injection
            return redirect('all')->with('success', "Successfully updated.");
        }
    }
}
