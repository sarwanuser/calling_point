<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = ["name","mobile","email","location","contact_type","source","website","additional_info","status"];

    protected $table = 'contacts';

    protected $primaryKey = 'id';
}
