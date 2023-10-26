<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Contacts;

class DoNotCallController extends Controller
{
    public function index(Request $request)
    {   
        $data = [];
        $contact_type = Contacts::select('contact_type')->where('donot_call', 'R')->where('contact_type', '!=', '')->orderby('contact_type', 'ASC')->get()->unique('contact_type');
                        // ->where('status', 'ACTIVE')
        $source = Contacts::select('source')->where('donot_call', 'R')->where('source', '!=', '')->orderby('source', 'ASC')->get()->unique('source');
        
        if ($request->has('search')) {
            $data = Contacts::where('donot_call', 'R')->orderby('created_at','DESC')->get();

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

        return view('Admin.DoNotCall.index', compact('data', 'contact_type', 'source'));
    }


    public function approve(Request $request, $id){
        // dd($request->all(), $id);
        // code for don't call and update in contact master
        $donot_call = Contacts::find($id);
        if ($donot_call) {
            $donot_call->donot_call = 'A';
            $donot_call->update();
            return back()->with(['Success' =>"Don't Call Approved Successfully !"]);
        } 
        else {
            return back()->with('Failed', "Error while Approving ");
        }
    }

    public function reject(Request $request, $id){
        // dd($request->all(), $id);
        // code for don't call and update in contact master
        $donot_call = Contacts::find($id);
        if ($donot_call) {
            $donot_call->donot_call = 'C';
            $donot_call->update();
            return back()->with(['Success' =>"Don't Call Rejected Successfully !"]);
        }
        else {
            return back()->with('Failed', "Error while Rejecting");
        }
    }
}
