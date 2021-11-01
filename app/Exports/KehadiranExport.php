<?php

namespace App\Exports;

use App\Models\Kehadiran;
use App\Models\Pertemuan;
use App\Models\Jadwal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KehadiranExport implements FromView, ShouldAutoSize
{

    protected $id;

     function __construct($id) {
            $this->id = $id;
     }

    /**
    * @return \Illuminate\Support\Collection
    */

    // public function headings(): array
    // {
    //     return [
    //         '#',
    //         'User',
    //         'Date',
    //     ];
    // }

    // public function collection()
    // {
        
    //     return Kehadiran::where('id', $this->id)->get();
    // }

    public function view(): view
    {
        $kehadirans = Kehadiran::where('pertemuan_id', $this->id)->get();
        $pertemuans = Pertemuan::where('id', $this->id)->first();
        
        return view('guru.export_kehadiran', [
            'kehadirans' => $kehadirans,
            'pertemuans' => $pertemuans,
        ]);
    }
}
