<?php

namespace App\Http\Controllers\Spoker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpokerController extends Controller
{   
    // login page
    public function index(){
        if(Session()->get('users')){
            return redirect('dashboard');
        }
        return view('Spoker.login');
    }
    public function spoker()
    {
        return view('Spoker.dashboard');
    }
}
