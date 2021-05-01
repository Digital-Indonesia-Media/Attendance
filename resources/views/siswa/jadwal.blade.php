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
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <th class="center">No</th>
                                <th class="center">Tahun Pelajaran</th>
                                <th class="center">Kelas</th>
                                <th class="center">Mata Pelajaran</th>
                                <th class="center">Hari</th>
                                <th class="center">Waktu</th>
                                <th class="center">Minggu Ke-</th>
                                <th class="center">Aksi</th>
                            </thead>

                            @foreach ($jadwals as $jadwal)
                            <tbody>
                                <th class="center">{{ $jadwal->id }}</th>
                                <th class="center">{{ $jadwal->tapel->tapel }}</th>
                                <th class="center">{{ $jadwal->kelas->kelas }}</th>
                                <th class="center">{{ $jadwal->mapel->mapel }}</th>
                                <th class="center">{{ $jadwal->hari }}</th>
                                <th class="center">{{ $jadwal->waktu }}</th>
                                <th class="center">{{ $jadwal->minggu }}</th>
                                <th class="center">
                                    <button class="btn btn-sm btn-warning">
                                        <a href="{{ route('jadwal-edit', $jadwal->id) }}">Edit</a> 
                                    </button>
                                    <button onclick="hapus( {{$data->id}}  )" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </th>
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