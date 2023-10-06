<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Contacts;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportContacts;

class ContactsController extends Controller
{
    public function index()
    {   
        $data = Contacts::orderby('created_at','DESC')->get();
        return view('Admin.Contacts.index', compact('data'));
    }

    public function create()
    {
        return view('Admin.Contacts.create');
    }

    // This function is used for the store Service
    Public function store(Request $request){
        try {
            $POST = $request->all();
            // dd($POST);

            // Check for Duplicate Entry Mobile and Email
            if (Contacts::where('mobile', $request->mobile)->first()) {
                return response()->json(['status'=>'0', 'msg' =>"Mobile - $request->mobile is allready saved."]);
            }
            if (Contacts::where('email', $request->email)->first()) {
                return response()->json(['status'=>'0', 'msg' =>"Email - $request->email is allready saved."]);
            }
            $data = new Contacts();

            $data->name      = $request->name;  
            $data->mobile    = $request->mobile;
            $data->email     = $request->email;
            $data->location  = $request->location;
            $data->contact_type  = $request->contact_type;
            $data->source    = $request->source;
            $data->website   = $request->website;
            $data->additional_info = $request->additional_info;
            $data->status    = $request->status;
            $data->save();

            return response()->json(['status'=>'1', 'msg' =>"Contact Details Submitted Successfully !", 'data'=>$data]);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response()->json(['status'=>'0', 'msg' =>"$msg", 'data'=>$data]);
        }
    }

    // Delete Service By his unique ID
    public function delete($id){
        $employee = Contacts::find($id);
        if ($employee) {
            $employee->delete();    
            return back()->with(['Success' =>"ID - $id Contact Deleted Successfully !"]);
        } 
        else {
            return back()->with('Failed', "Error while deleting ID- $id");
        }
    }


    // Fetch all details of Specific Menu Url by his unique ID for Edit Register Details
    public function edit($id){
        $data = Contacts::find($id);
        if ($data) {
            return view('Admin.Contacts.update', compact('data'));
        } else {
            return redirect('/admin/services')->with('Failed', "No Record found for ID- $id");
        }
    }

    // this function is used for update by Employee By his unique ID 
    public function update(Request $request, $id)
    {
        try{
            // dd($request->all());
            $data = Contacts::find($id);
            if ($data) {

                $data->name      = $request->name;  
                $data->mobile    = $request->mobile;
                $data->email     = $request->email;
                $data->location  = $request->location;
                $data->contact_type  = $request->contact_type;
                $data->source    = $request->source;
                $data->website   = $request->website;
                $data->additional_info = $request->additional_info;
                $data->status    = $request->status;    
                $data->update();
                
                return response()->json(['status'=>'1', 'msg' =>"ID- $id Update Successfully !", 'data'=>$data]);
            }
            else {
                return response()->json(['status'=>'0', 'msg' =>"Error while updating Employee ID - $id"]);
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response()->json(['status'=>'0', 'msg' =>"$msg", 'data'=>$data]);
        }
    }

    // Import Excel File
    public function import(Request $request){
        // dd($request->all());
        try{
            Excel::import(new ImportContacts, $request->file('file'));
            return back()->with(['Success' => "Contact Imported Successfully !"]);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return back()->with(['Failed' =>"$msg"]);
        }
    }
}
