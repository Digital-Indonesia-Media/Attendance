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
                    
                    <div class="card">
                        <div class="card-header">Senin</div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Kelas</th>
                                    <th>Mapel</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Senin')
                                <tr>
                                    <td>{{ $data->kelas->kelas }}</td>
                                    <td>{{ $data->mapel->mapel }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td>
                                        <a href="{{ route('siswa-pertemuan', $data->mapel) }}">Selengkapnya</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">Selasa</div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Kelas</th>
                                    <th>Mapel</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Selasa')
                                <tr>
                                    <td>{{ $data->kelas->kelas }}</td>
                                    <td>{{ $data->mapel->mapel }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td>
                                        <a href="{{ route('siswa-pertemuan', $data->mapel) }}">Selengkapnya</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">Rabu</div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Kelas</th>
                                    <th>Mapel</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Rabu')
                                <tr>
                                    <td>{{ $data->kelas->kelas }}</td>
                                    <td>{{ $data->mapel->mapel }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td>
                                        <a href="{{ route('siswa-pertemuan', $data->mapel) }}">Selengkapnya</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">Kamis</div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Kelas</th>
                                    <th>Mapel</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Kamis')
                                <tr>
                                    <td>{{ $data->kelas->kelas }}</td>
                                    <td>{{ $data->mapel->mapel }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td>
                                        <a href="{{ route('siswa-pertemuan', $data->mapel) }}">Selengkapnya</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">Jumat</div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Kelas</th>
                                    <th>Mapel</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Jumat')
                                <tr>
                                    <td>{{ $data->kelas->kelas }}</td>
                                    <td>{{ $data->mapel->mapel }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td>
                                        <a href="{{ route('siswa-pertemuan', $data->mapel) }}">Selengkapnya</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><br>
                </div>
            </div><br>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection