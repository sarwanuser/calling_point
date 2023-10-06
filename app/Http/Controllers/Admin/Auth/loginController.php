<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Admin;
use Session;

class loginController extends Controller
{   
    // this function is used for Login and Check valid user
    public function login(Request $request){
        $this->validate($request,[
            'user' =>'required',
            'password' =>'required',
        ]);

        $user = $request->user;
        $psw = $request->password;

        if ($data = admin::where('user', $user)->first()) {
            if ($data->password == $request->password) {
                Session::forget('admins');
                session(['admins' => $data]);
                return redirect('/admin/dashboard')->with(['status'=>'1', 'msg' =>"Login Successfully !"]);
            } 
            else {
                return back()->with('Failed', 'Invalid Username or Password');
            }
        } 
        else {
            return back()->with('Failed', 'Invalid User !');
        }
    }
}