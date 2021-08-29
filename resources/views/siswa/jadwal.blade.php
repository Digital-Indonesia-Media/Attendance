@extends('layouts.app')

@section('title')
Jadwal
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li>
    <a href=" {{ route('siswa') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li class="active">
    <a href="{{ route('siswa-jadwal') }}">
      <i class="now-ui-icons education_agenda-bookmark"></i>
      <p>Jadwal</p>
    </a>
  </li>

  <li>
    <a href="{{ route('siswa-profile') }}">
      <i class="now-ui-icons users_single-02"></i>
      <p>Profil Pengguna</p>
    </a>
  </li>
</ul>
@endsection

@section('username')
{{ Auth::user()->name }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                                <td>Kelas</td>
                                <td>Mapel</td>
                                <td>Waktu</td>
                                <td>Aksi</td>
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
                                <td>Kelas</td>
                                <td>Mapel</td>
                                <td>Waktu</td>
                                <td>Aksi</td>
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
                                <td>Kelas</td>
                                <td>Mapel</td>
                                <td>Waktu</td>
                                <td>Aksi</td>
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
                                <td>Kelas</td>
                                <td>Mapel</td>
                                <td>Waktu</td>
                                <td>Aksi</td>
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
                                <td>Kelas</td>
                                <td>Mapel</td>
                                <td>Waktu</td>
                                <td>Aksi</td>
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
@endsection

@section('js')
    
@endsection