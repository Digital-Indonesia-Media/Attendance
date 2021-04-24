<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
	protected $table = 'jadwal';

    public $fillable = [
    	'tapel_id', 'kelas_id', 'mapel_id', 'hari', 'waktu', 'minggu',
    ];

    public function tapel()
    {
    	return $this->belongsTo('App\Models\TahunAjaran');
    }

    public function mapel()
    {
    	return $this->belongsTo('App\Models\MataPelajaran');
    }

    public function kelas()
    {
    	return $this->belongsTo('App\Models\Kelas');
    }
}
