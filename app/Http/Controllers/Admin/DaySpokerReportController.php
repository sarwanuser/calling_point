<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\AssignContacts;
use App\Admin\Contacts;
use App\Admin\Spokers;
use DB;

class DaySpokerReportController extends Controller
{
    public function daySpokerReport(Request $request)
    {   
        $data = [];
        $spoker = Spokers::select('id','name')->where('status', 'ACTIVE')->orderby('name', 'ASC')->get();

        if ($request->has('search')) {
            // dd($request->all());
            $data = AssignContacts::orderby('created_at','DESC')->where('follow_up', 'DONE')->get()->unique('spoker_id');;

            // filter From Date and To Date 
            if ($request->from_date!='') {
                $from = date("Y-m-d 00:00:00", strtotime($request->from_date)); 
                $to   = date("Y-m-d 00:00:00", strtotime($request->to_date));
                // dd($from, $to);
                $data = $data->whereBetween('updated_at', [$from, $to]);
            }

            // filter spoker_id 
            if ($request->spoker_id != '%') {
                $data = $data->where('spoker_id', $request->spoker_id);
            }
            // dd($data);
        }

        return view('Admin.Report.DayAssignReport', compact('data', 'spoker'));
    }
}
