<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\MataPelajaran;

class MapelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                MataPelajaran::create([
                    'mapel' => $row[0],
                    'status' => 1,
                    'tapel' => $row[1],
                ]);
            }
        }
    }
}
