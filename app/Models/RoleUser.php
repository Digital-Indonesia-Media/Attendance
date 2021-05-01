<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public $fillable = [
    	'role_id', 'user_id',
    ];
}
