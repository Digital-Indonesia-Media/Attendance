<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Kelas;

class KelasImport implements ToCollection
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
                    'kelas' => $row[0],
                    'tapel' => $row[1],
                ]);
            }
        }
    }
}
