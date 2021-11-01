<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\User;

class userImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        // dd($collection);
        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                User::create([
                    'name' => 'Ortu ' . $row[0],
                    'role' => 'ortu',
                    'kelas' => $row[2],
                    'tapel' => $row[3],
                    'email' => 'ortu.' . $row[4],
                    'password' => Hash::make($row[5]),
                ]);
            }
        }

        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                User::create([
                    'name' => $row[0],
                    'role' => $row[1],
                    'kelas' => $row[2],
                    'tapel' => $row[3],
                    'email' => $row[4],
                    'password' => Hash::make($row[5]),
                ]);
            }
        }
    }
}
