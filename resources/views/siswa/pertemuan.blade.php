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
                                <th class="center">{{ $pertemuan->pertemuan_ke }}</th>
                                <th class="center">{{ $pertemuan->mapel }}</th>
                                <th class="center">{{ $pertemuan->pembahasan }}</th>
                                <th class="center">
                                    <a href="{{ route('siswa-pertemuan-hadir', $pertemuan->id) }}">
                                        <button class="btn btn-sm btn-success">Hadir</button>
                                    </a>
                                    <a href="{{ route('siswa-pertemuan-hadir', $pertemuan->id) }}">
                                        <button class="btn btn-sm btn-warning">Izin</button>
                                    </a> 
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