<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\AssignContacts;
use App\Admin\Contacts;
use App\Admin\Spokers;
use DB;

class UnassignContactsController extends Controller
{
    public function unassign(Request $request)
    {   
        $data = [];
        $count_assign = count(AssignContacts::select('contact_type')->get());
        $count_unassign = count(Contacts::select('contact_type')->where('assigned_status', 'UNASSIGNED')->where('status', 'ACTIVE')->get());
        $contact_type = Contacts::select('contact_type')->where('contact_type', '!=', '')->where('status', 'ACTIVE')->orderby('contact_type', 'ASC')->get()->unique('contact_type');
        $source = Contacts::select('id','source')->where('source', '!=', '')->where('status', 'ACTIVE')->orderby('source', 'ASC')->get()->unique('source');
        $spoker = Spokers::select('id','name')->where('status', 'ACTIVE')->orderby('name', 'ASC')->get();
        
        if ($request->has('search')) {
            $data = Contacts::orderby('created_at','DESC')->where('status', 'ACTIVE')->where('assigned_status', 'UNASSIGNED')->get();

            // filter contact type 
            if ($request->contact_type != '%') {
                $data = $data->where('contact_type', $request->contact_type);
            }

            // filter source 
            if ($request->source != '%') {
                $data = $data->where('source', $request->source);
            }
        }


        // This function is used for assign contacts 
        if ($request->has('assign')) {
            try {
                // dd($request->all());
                // Begin a transaction
                DB::beginTransaction();

                // code for Sub Titles and images 
                if (isset($request->assiged_check)) {
                    $count = count($request->assiged_check);
                    // dd($count);
                    if($count > 0)
                    {   
                        // Save projects sub details
                        for ($x = 0; $x < $count; $x++)
                        {   
                            @$data = Contacts::where('status', 'ACTIVE')->where('assigned_status', 'UNASSIGNED')->where('id', $request->assiged_check[$x])->first();
                            // dd($data);
                            if ($data) {
                                $update = Contacts::find($request->assiged_check[$x]);
                                $update->assigned_status = 'ASSIGNED';
                                $update->update();

                                $assign = new AssignContacts();

                                $assign->name           = $data->name;  
                                $assign->mobile         = $data->mobile;
                                $assign->email          = $data->email;
                                $assign->location       = $data->location;
                                $assign->contact_type   = $data->contact_type;
                                $assign->source         = $data->source;
                                $assign->contact_id     = $data->id;
                                $assign->spoker_id      = $request->spoker_id;
                                $assign->website        = $data->website;
                                $assign->additional_info=$data->additional_info;
                                $assign->status         = $data->status;
                                $assign->save();
                            }
                        }
                    }
                }

                // Commit the transaction
                DB::commit();
                return redirect('/admin/unassign-contacts')->with(['Success' =>"Contact Assigned Successfully !"]);
            } catch (\Exception $e) {
                // An error occured; cancel the transaction...
                DB::rollback();
                $msg = $e->getMessage();
                return back()->with(['Failed' =>$msg]);
            }
        }
        return view('Admin.AssignContacts.unassign', compact('data','count_assign','count_unassign','contact_type', 'source', 'spoker'));
    }
}
