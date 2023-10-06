<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Spokers;
use Illuminate\Support\Facades\Hash;

class SpokersController extends Controller
{
    public function index()
    {   
        $data = Spokers::orderby('created_at','DESC')->get();
        return view('Admin.Spokers.index', compact('data'));
    }

    public function create()
    {
        return view('Admin.Spokers.create');
    }

    // This function is used for the store Service
    Public function store(Request $request){
        try {
            $POST = $request->all();
            // dd($POST);
            if (Spokers::where('email', $request->email)->first()) {
                return response()->json(['status'=>'0', 'msg' =>"Email - $request->email is allready register."]);
            }
            $data = new Spokers();

            $data->name      = $request->name;  
            $data->email     = $request->email;
            $data->password  = hash::make($request->password);
            $data->status    = $request->status;
            $data->save();

            return response()->json(['status'=>'1', 'msg' =>"Spoker Details Submitted Successfully !", 'data'=>$data]);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response()->json(['status'=>'0', 'msg' =>"$msg", 'data'=>$data]);
        }
    }

    // Delete Service By his unique ID
    public function delete($id){
        $employee = Spokers::find($id);
        if ($employee) {
            $employee->delete();    
            return back()->with(['Success' =>"ID - $id Spoker Deleted Successfully !"]);
        } 
        else {
            return back()->with('Failed', "Error while deleting ID- $id");
        }
    }


    // Fetch all details of Specific Menu Url by his unique ID for Edit Register Details
    public function edit($id){
        $data = Spokers::find($id);
        if ($data) {
            return view('Admin.Spokers.update', compact('data'));
        } else {
            return redirect('/admin/services')->with('Failed', "No Record found for ID- $id");
        }
    }

    // this function is used for update by Employee By his unique ID 
    public function update(Request $request, $id)
    {
        try{
            // dd($request->all());
            $data = Spokers::find($id);
            if ($data) {
                $data->name      = $request->name;  
                $data->email     = $request->email;
                if ($request->password) {
                    $data->password  = hash::make($request->password);
                }
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
}
