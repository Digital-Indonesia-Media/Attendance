<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Jadwal;

class JadwalImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                Jadwal::create([
                    'tapel' => $row[0],
                    'kelas' => $row[1],
                    'mapel' => $row[2],
                    'guru' => $row[3],
                    'hari' => $row[4],
                    'waktu' => $row[5],
                ]);
            }
        }
    }
}
