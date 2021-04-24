<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    public $fillable = [
    	'pertemuan_id', 'status',
    ];
}
