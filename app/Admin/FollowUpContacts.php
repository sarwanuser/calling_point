<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class FollowUpContacts extends Model
{
    protected $fillable = ['assign_contact_id','spoker_id','followup_date','comment','flag'];

    protected $table = 'cp_followup_contacts';

    protected $primaryKey = 'id';
}
