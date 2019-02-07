<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\User;

class RegistrationController extends Controller
{
    // show index page
    public function index(){
        return view('Register.index');
    }

    // register user
    public function register(RegistrationRequest $request){
        $user = new User();
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->password = $request->pass1;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->profilePicture = 'have-to-rename';
        $user->status = 'active';
        $user->area = $request->area;
        $user->save();

        // Profile picture
        $lastID = User::find($user->id);
        if ($request->hasFile('profilePic')) {
            $image = $request->file('profilePic');
            $name = $user->id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/profile_picture');
            //$imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $lastID->profilePicture = $name;
            $lastID->save();
        }
        $request->session()->flash('success_message', 'User Registered Successsfully');
        return redirect()->route('showLogin');
    }
}
