<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    public $fillable = [
    	'mapel', 'pertemuan_ke', 'pembahasan', 'kelas',
    ];
}
