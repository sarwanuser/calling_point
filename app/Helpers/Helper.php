<?php

use App\Admin\Spokers;

if (!function_exists('getSpokerName')) {
    function getSpokerName($id)
    {
        @$data = Spokers::where('id', $id)->first();
        // dd($data);
        return @$data->name;
    }
}