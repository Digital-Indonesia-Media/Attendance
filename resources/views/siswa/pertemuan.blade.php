@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Jadwal') }}
                    <a href="{{ route('siswa') }}" style="padding-left: 85%;"><button class="btn btn-primary">Back</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>
                        <table class="table">
                            <thead>
                                <th class="center">Pertemuan Ke-</th>
                                <th class="center">Mapel</th>
                                <th class="center">Pembahasan</th>
                                <th class="center">Aksi</th>
                            </thead>
                            @foreach($pertemuans as $pertemuan)
                            <tbody>
                                <td class="center">{{ $pertemuan->pertemuan_ke }}</td>
                                <td class="center">{{ $pertemuan->mapel }}</td>
                                <td class="center">{{ $pertemuan->pembahasan }}</td>
                                <td class="center inline">
                                    @if ($pertemuan->kehadiran() == 0)
                                        <div style="margin: auto;">
                                            Absen
                                        </div>
                                    @elseif($pertemuan->kehadiran() == 1)
                                        <div style="margin: auto;">
                                            Hadir
                                        </div>
                                    @elseif($pertemuan->kehadiran() == 2)
                                        <div style="margin: auto;">
                                            Izin
                                        </div>
                                    @else
                                        <div style="margin: auto;">
                                            <form action="{{ route('siswa-pertemuan-hadir', $pertemuan->id) }}"  method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-success">Hadir</button>
                                            </form>
                                            <form action="{{ route('siswa-pertemuan-izin', $pertemuan->id) }}"  method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-warning">Izin</button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div><br>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection