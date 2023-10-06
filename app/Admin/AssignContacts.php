<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class AssignContacts extends Model
{
    protected $fillable = ['name','mobile','email','location','contact_type','source','contact_id','spoker_id','status','follow_up','follow_up_date','website','additional_info','favorite_status','type'];

    protected $table = 'assign_contacts';

    protected $primaryKey = 'id';
}
