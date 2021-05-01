<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    public $fillable = [
    	'name_id', 'kelas_id', 'mapel_id', 'pertemuan_id', 'status',
    ];
}
