<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Contacts;
use App\Admin\AssignContacts;
use DB;

class AssignContactsController extends Controller
{
    public function assign(Request $request)
    {   
        $data = [];
        $count_assign = count(AssignContacts::select('contact_type')->get());
        $count_unassign = count(Contacts::select('contact_type')->where('assigned_status', 'UNASSIGNED')->where('status', 'ACTIVE')->get());
        $contact_type = Contacts::select('contact_type')->where('contact_type', '!=', '')->orderby('contact_type', 'ASC')->get()->unique('contact_type');
                        // ->where('status', 'ACTIVE')
        $source = Contacts::select('source')->where('source', '!=', '')->orderby('source', 'ASC')->get()->unique('source');
                        // ->where('status', 'ACTIVE')
        
        if ($request->has('search')) {
            $data = AssignContacts::orderby('created_at','DESC')->get();

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
        return view('Admin.AssignContacts.index', compact('data','count_assign','count_unassign','contact_type', 'source'));
    }

    // public function create()
    // {
    //     return view('Admin.AssignContacts.create');
    // }

    // // This function is used for the store Service
    // Public function store(Request $request){
    //     try {
    //         $POST = $request->all();
    //         // dd($POST);

    //         // Check for Duplicate Entry Mobile and Email
    //         if (AssignContacts::where('mobile', $request->mobile)->first()) {
    //             return response()->json(['status'=>'0', 'msg' =>"Mobile - $request->mobile is allready saved."]);
    //         }
    //         if (AssignContacts::where('email', $request->email)->first()) {
    //             return response()->json(['status'=>'0', 'msg' =>"Email - $request->email is allready saved."]);
    //         }
    //         $data = new Contacts();

    //         $data->name      = $request->name;  
    //         $data->mobile    = $request->mobile;
    //         $data->email     = $request->email;
    //         $data->location  = $request->location;
    //         $data->contact_type  = $request->contact_type;
    //         $data->source    = $request->source;
    //         $data->website   = $request->website;
    //         $data->additional_info = $request->additional_info;
    //         $data->status    = $request->status;
    //         $data->save();

    //         return response()->json(['status'=>'1', 'msg' =>"Contact Details Submitted Successfully !", 'data'=>$data]);
    //     } catch (\Exception $e) {
    //         $msg = $e->getMessage();
    //         return response()->json(['status'=>'0', 'msg' =>"$msg", 'data'=>$data]);
    //     }
    // }

    // // Delete Service By his unique ID
    // public function delete($id){
    //     $employee = AssignContacts::find($id);
    //     if ($employee) {
    //         $employee->delete();    
    //         return back()->with(['Success' =>"ID - $id Contact Deleted Successfully !"]);
    //     } 
    //     else {
    //         return back()->with('Failed', "Error while deleting ID- $id");
    //     }
    // }


    // // Fetch all details of Specific Menu Url by his unique ID for Edit Register Details
    // public function edit($id){
    //     $data = AssignContacts::find($id);
    //     if ($data) {
    //         return view('Admin.AssignContacts.update', compact('data'));
    //     } else {
    //         return redirect('/admin/services')->with('Failed', "No Record found for ID- $id");
    //     }
    // }

    // // this function is used for update by Employee By his unique ID 
    // public function update(Request $request, $id)
    // {
    //     try{
    //         // dd($request->all());
    //         $data = AssignContacts::find($id);
    //         if ($data) {

    //             $data->name      = $request->name;  
    //             $data->mobile    = $request->mobile;
    //             $data->email     = $request->email;
    //             $data->location  = $request->location;
    //             $data->contact_type  = $request->contact_type;
    //             $data->source    = $request->source;
    //             $data->website   = $request->website;
    //             $data->additional_info = $request->additional_info;
    //             $data->status    = $request->status;    
    //             $data->update();
                
    //             return response()->json(['status'=>'1', 'msg' =>"ID- $id Update Successfully !", 'data'=>$data]);
    //         }
    //         else {
    //             return response()->json(['status'=>'0', 'msg' =>"Error while updating Employee ID - $id"]);
    //         }
    //     } catch (\Exception $e) {
    //         $msg = $e->getMessage();
    //         return response()->json(['status'=>'0', 'msg' =>"$msg", 'data'=>$data]);
    //     }
    // }
}