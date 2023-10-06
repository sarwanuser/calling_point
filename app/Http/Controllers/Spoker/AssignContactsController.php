<?php

namespace App\Http\Controllers\Spoker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Contacts;
use App\Admin\AssignContacts;
use DB;

class AssignContactsController extends Controller
{   
    public function assign(Request $request)
    {
        $user = Session()->get('users');
        $data = [];
        $contact_type = AssignContacts::select('contact_type')->where('spoker_id', $user->id)->where('contact_type', '!=', '')->orderby('contact_type', 'ASC')->get()->unique('contact_type');
                        // ->where('status', 'ACTIVE')
        $source = AssignContacts::select('source')->where('spoker_id', $user->id)->where('source', '!=', '')->orderby('source', 'ASC')->get()->unique('source');
                        // ->where('status', 'ACTIVE')
        
        if ($request->has('search')) {
            $data = AssignContacts::orderby('created_at','DESC')->where('spoker_id', $user->id)->get();

            // filter contact type 
            if ($request->contact_type != '%') {
                $data = $data->where('contact_type', $request->contact_type);
            }

            // filter source 
            if ($request->source != '%') {
                $data = $data->where('source', $request->source);
            }
        }

        // dd($contact_type, $source);
        return view('Spoker.AssignContacts.index', compact('data', 'contact_type', 'source'));
    }
}