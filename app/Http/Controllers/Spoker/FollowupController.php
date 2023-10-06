<?php

namespace App\Http\Controllers\Spoker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Contacts;
use App\Admin\AssignContacts;
use DB;

class FollowupController extends Controller
{
    public function followUp(Request $request)
    {
        $user = Session()->get('users');
        $data = [];
        return view('Spoker.Contacts.followup', compact('data'));
    }


    public function pastFollowUp(Request $request)
    {
        $user = Session()->get('users');
        $data = [];
        return view('Spoker.Contacts.past-followup', compact('data'));
    }


    public function todayFollowUp(Request $request)
    {
        $user = Session()->get('users');
        $data = [];
        return view('Spoker.Contacts.today-followup', compact('data'));
    }


    public function futureFollowUp(Request $request)
    {
        $user = Session()->get('users');
        $data = [];
        return view('Spoker.Contacts.future-followup', compact('data'));
    }
}