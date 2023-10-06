<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{   
    // login page
    public function index(){
        if(Session()->get('admins')){
            return redirect('admin/dashboard');
        }
        return view('Admin.login');
    }
    public function admin()
    {
        return view('Admin.dashboard');
    }
}
