<?php

use App\Admin\Spokers;
use App\Admin\AssignContacts;
use App\Admin\FollowUpContacts;
use App\Admin\Contacts;

if (!function_exists('getSpokerName')) {
    function getSpokerName($id)
    {
        @$data = Spokers::where('id', $id)->first();
        // dd($data);
        return @$data->name;
    }
}


// find the count of followups record

if (!function_exists('getFollowupContact')) {
    function getFollowupContact($followUpType)
    {   
        $user = Session()->get('users');
        $assignContact = AssignContacts::where('spoker_id', $user->id);

        if ($followUpType == 'new') {
            return $assignContact->where('status','ACTIVE')->count();
        }
        elseif ($followUpType == 'past') {
            return $assignContact->where('status','FOLLOWUP')->where('follow_up_date', '<', date('Y-m-d'))->count();
        }
        elseif ($followUpType == 'today') {
            return $assignContact->where('status','FOLLOWUP')->where('follow_up_date', '=', date('Y-m-d'))->count();
        }
        elseif ($followUpType == 'future') {
            return $assignContact->where('status','FOLLOWUP')->where('follow_up_date', '>', date('Y-m-d'))->count();
        }
    }
}


// get Follow Up DTL
if (!function_exists('getFollowUpDTL')) {
    function getFollowUpDTL($id)
    {
        $user = Session()->get('users');
        @$data = FollowUpContacts::where('assign_contact_id', $id)->where('spoker_id', $user->id)->orderby('created_at', 'DESC')->get();
        // dd($data);
        return @$data;
    }
}


// get No Of Assign Contact
if (!function_exists('getNoOfAssignContact')) {
    function getNoOfAssignContact($spoker_id, $from_date, $to_date)
    {   
        // dd($spoker_id, $from_date, $to_date);
        $from = date("Y-m-d 00:00:00", strtotime($from_date)); 
        $to   = date("Y-m-d 00:00:00", strtotime($to_date));
        @$data = AssignContacts::where('spoker_id', $spoker_id)->whereBetween('updated_at', [$from, $to])->count();
        // dd($data);
        return @$data;
    }
}

// get No Of Assign Contact
if (!function_exists('getNoOfFolUpContact')) {
    function getNoOfFolUpContact($spoker_id, $from_date, $to_date)
    {   
        // dd($spoker_id, $from_date, $to_date);
        $from = date("Y-m-d 00:00:00", strtotime($from_date)); 
        $to   = date("Y-m-d 00:00:00", strtotime($to_date));
        @$data = AssignContacts::where('spoker_id', $spoker_id)->where('follow_up', 'DONE')->whereBetween('updated_at', [$from, $to])->count();
        // dd($data);
        return @$data;
    }
}


// admin dashboard
    // get total No Of All Contacts
    if (!function_exists('getNoOfTotalContactAdmin')) {
        function getNoOfTotalContactAdmin()
        {   
            @$data = Contacts::where('status', 'ACTIVE')->count();
            // dd($data);
            return @$data;
        }
    }


    // get total No Of unassign Contact
    if (!function_exists('getNoOfTotalUnassignAdmin')) {
        function getNoOfTotalUnassignAdmin()
        {   
            @$data = Contacts::where('assigned_status', 'UNASSIGNED')->where('status', 'ACTIVE')->count();
            // dd($data);
            return @$data;
        }
    }


    // get total No Of assign Contact
    if (!function_exists('getNoOfTotalAssignAdmin')) {
        function getNoOfTotalAssignAdmin()
        {   
            @$data = Contacts::where('assigned_status', 'ASSIGNED')->where('status', 'ACTIVE')->count();
            // dd($data);
            return @$data;
        }
    }


    // get total No Of unassign Contact
    if (!function_exists('getNoOfTotalSpokers')) {
        function getNoOfTotalSpokers()
        {   
            @$data = Spokers::where('status', 'ACTIVE')->count();
            // dd($data);
            return @$data;
        }
    }

    // get total No Of unassign Contact
    if (!function_exists('getNoOfTotalTodayFollowUpAdmin')) {
        function getNoOfTotalTodayFollowUpAdmin()
        {   
            @$data = AssignContacts::where('status','FOLLOWUP')->where('follow_up_date', '=', date('Y-m-d'))->count();
            // dd($data);
            return @$data;
        }
    }