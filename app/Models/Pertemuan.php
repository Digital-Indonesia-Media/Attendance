<?php

namespace App\Models;
use App\Models\Kehadiran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pertemuan extends Model
{
    public $fillable = [
    	'tapel_id', 'kelas_id','mapel', 'pertemuan_ke', 'pembahasan', 'status', 'code', 'data_expired',
    ];

    public function kehadiran()
    {
    	$kehadiran = Kehadiran::where('name_id', Auth::user()->id)->where('pertemuan_id', $this->id)->first();
    	if (is_null($kehadiran)) {
    		return -1;
    	} else {
    		return $kehadiran->status;
    	}
    }
}
