<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class logOutController extends Controller
{
    // This function is used for logout and flush the Session
    Public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return Redirect('/admin')->with('Failed', 'Logout Successfully');
    }
}