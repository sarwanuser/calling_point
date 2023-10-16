<?php

namespace App\Http\Controllers\Spoker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Contacts;
use App\Admin\AssignContacts;
use App\Admin\FollowUpContacts;
use DB;

class FollowupController extends Controller
{   
    public function followUp(Request $request)
    {
        $user = Session()->get('users');
        $AssignContacts = AssignContacts::where('spoker_id', $user->id)->where('status','ACTIVE')->orderBy('updated_at' , 'desc')->get();
        // dd($AssignContacts);
        return view('Spoker.Contacts.followup', compact('AssignContacts'));
    }


    public function pastFollowUp(Request $request)
    {
        $user = Session()->get('users');
        $AssignContacts = AssignContacts::where('spoker_id', $user->id)->where('status','FOLLOWUP')->where('follow_up_date', '<', date('Y-m-d'))->orderBy('updated_at' , 'desc')->get();
        // dd($AssignContacts);
        return view('Spoker.Contacts.past-followup', compact('AssignContacts'));
    }


    public function todayFollowUp(Request $request)
    {
        $user = Session()->get('users');
        $AssignContacts = AssignContacts::where('spoker_id', $user->id)->where('status','FOLLOWUP')->where('follow_up_date', '=', date('Y-m-d'))->orderBy('updated_at' , 'desc')->get();
        // dd($AssignContacts);
        return view('Spoker.Contacts.today-followup', compact('AssignContacts'));
    }


    public function futureFollowUp(Request $request)
    {
        $user = Session()->get('users');
        $AssignContacts = AssignContacts::where('spoker_id', $user->id)->where('status','FOLLOWUP')->where('follow_up_date', '>', date('Y-m-d'))->orderBy('updated_at' , 'desc')->get();
        // dd($AssignContacts);
        return view('Spoker.Contacts.future-followup', compact('AssignContacts'));
    }


    // follow Up Store
    public function followUpStore(Request $request){
        try{
            // dd($request->all());
            DB::beginTransaction();
            $user = Session()->get('users');
            $data = AssignContacts::find($request->contact_id);
            if ($data) {
                $data->follow_up_date  = date('Y-m-d', strtotime($request->follow_up_date));  
                $data->status    = $request->status;    
                $data->favorite_status  = $request->favorite_status;
                $data->follow_up        = 'DONE';
                $data->update();


                $follow = new FollowUpContacts();

                $follow->assign_contact_id     = $request->contact_id;
                $follow->spoker_id      = $user->id;  
                $follow->followup_date  = date('Y-m-d', strtotime($request->follow_up_date)); 
                $follow->comment    = $request->comment;
                $follow->flag    = '1';
                $follow->save();
                
                
                // Commit the transaction
                DB::commit();
                return response()->json(['status'=>'1', 'msg' =>" Successfully Follow Up !", 'data'=>$data, 'new'=>@getFollowupContact('new'), 'past'=>@getFollowupContact('past'), 'today'=>@getFollowupContact('today'), 'future'=>@getFollowupContact('future')]);
            }
            else {
                return response()->json(['status'=>'0', 'msg' =>"Error while Follow Up"]);
            }
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            $msg = $e->getMessage();
            return response()->json(['status'=>'0', 'msg' =>"$msg", 'data'=>$data]);
        }
    }
}