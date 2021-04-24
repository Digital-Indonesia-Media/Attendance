@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Jadwal') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @foreach($datas as $data)
                    <div class="card">
                        <div class="card-header">{{ $data->hari }}</div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Kelas</th>
                                    <th>Mapel</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <th>{{ $data->kelas->kelas }}</th>
                                    <th>{{ $data->mapel->mapel }}</th>
                                    <th>{{ $data->waktu }}</th>
                                    <th>
                                        <a href="{{ route('guru-pertemuan', $data->id) }}">Selengkapnya</a>
                                    </th>
                                </tbody>
                            </table>
                        </div>
                    </div><br>
                    @endforeach
                </div>
            </div><br>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection