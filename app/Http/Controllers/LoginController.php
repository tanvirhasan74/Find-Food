<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\User;

class LoginController extends Controller
{
    // show login page
    public function index(){
        return view('Login.index');
    }

    // User Varification
    public function verifyUser(LoginRequest $request){
        $user = User::where([
            'username' => $request->username,
            'password' => $request->password
        ])->first();

        if($user){
            // checking for block user
            if($user->status == 'block')
            {
                $request->session()->flash('error_message', 'Opps! User Blocked');
                return redirect(route('showLogin'));
            }

            $request->session()->put('user', $user);
            //return redirect(route('Home'));
            return redirect(route('timeline'));
        }
        else{
            $request->session()->flash('error_message', 'User Not Found !');
            return redirect(route('showLogin'));
        }
    }

    // logout
    public function logout(Request $request){
        $request->session()->flush();
        return redirect(route('showLogin'));
    }
}
