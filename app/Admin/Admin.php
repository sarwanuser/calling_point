<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'cp_admins';

    protected $primaryKey = 'id';
}
