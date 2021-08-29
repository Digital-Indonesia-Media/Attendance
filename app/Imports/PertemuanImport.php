<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Pertemuans;

class PertemuanImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                Kelas::create([
                    'mapel' => $row[0],
                    'pertemuan_ke' => $row[1],
                    'pembahasan' => $row[2],
                ]);
            }
        }
    }
}
