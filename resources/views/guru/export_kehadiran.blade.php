<table class="table">
<thead>
    <tr>
        <td class="center">Nama</td>
        <td class="center">Kelas</td>
        <td class="center">Mapel</td>
        <td class="center">Pembahasan</td>
        <td class="center">Status</td>
    </tr>
</thead>
@foreach($kehadirans as $kehadiran)
<tbody>
    <tr>
        <td class="center">{{ $kehadiran->user->name }}</td>
        <td class="center">{{ $kehadiran->kelas->kelas }}</td>
        <td class="center">{{ $kehadiran->mapel->mapel }}</td>
        <td class="center">{{ $pertemuans->pembahasan }}</td>
        @if ($kehadiran->status == 1)
            <td class="center">
                <p style="color:#f96332; padding-top: 17px;">Hadir</p>
            </td>
        @elseif ($kehadiran->status == 2)
            <td class="center">
                <p style="color:#f96332; padding-top: 17px;">Izin</p>
            </td>
        @else ($kehadiran->status == 0)
            <td class="center">
                <p style="color:#f96332; padding-top: 17px;">Alfa</p>
            </td>
        @endif
    </tr>
</tbody>
@endforeach
</table>

