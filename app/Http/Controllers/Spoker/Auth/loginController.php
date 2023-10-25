<?php

namespace App\Http\Controllers\Spoker\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin\Spokers;
use Session;

class loginController extends Controller
{   
    // this function is used for Login and Check valid user
    public function login(Request $request){
        $this->validate($request,[
            'email' =>'required',
            'password' =>'required',
        ]);

        $email = $request->email;
        $psw = $request->password;

        if ($data = Spokers::where('email', $email)->first()) {
            $pass = Hash::check($psw, $data->password);
            if ($pass) {
                // check for user is Inactive
                if ($data->status=='INACTIVE') {
                    return back()->with('Failed', 'Your ID is Inactive by Admin');
                }
                
                Session::forget('users');
                session(['users' => $data]);
                return redirect('/dashboard')->with(['status'=>'1', 'msg' =>"Login Successfully !"]);
            } 
            else {
                return back()->with('Failed', 'Invalid Email ID or Password');
            }
        } 
        else {
            return back()->with('Failed', 'Invalid User !');
        }
    }
}