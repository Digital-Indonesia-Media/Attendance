<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    public $fillable = [
    	'name_id', 'kelas_id', 'mapel_id', 'pertemuan_id', 'status', 'izin', 'date_present', 
    ];

    public function mapel()
    {
        return $this->belongsTo('App\Models\MataPelajaran');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas');
    }

    public function pertemuan()
    {
        return $this->belongsTo('App\Models\Pertemuan');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', "name_id");
    }

}
