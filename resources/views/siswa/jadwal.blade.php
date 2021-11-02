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
            <div class="card-header">Jadwal Kelas <label style="color:#f96332;">{{ $datas[0]->kelas->kelas }}</label></div>

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
                        @if($senins == 0)
                            <thead class="center" style="width:100%; text-align: center;">
                                <td>Tidak ada jam mengajar</td>
                            </thead>
                        @else
                            <thead>
                                <td style="width: 30%;">Mapel</td>
                                <td style="width: 30%;">Jam</td>
                                <td class="center" style="width: 40%;">Keterangan</td>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                            @if ($data->hari == 'Senin')
                            <tr>
                                <td>{{ $data->mapel->mapel }}</td>
                                <td>{{ $data->waktu }}</td>
                                <td class="center">
                                    <form action="{{ route('siswa-pertemuan', $data->mapel) }}">
                                        <button type="submit" class="btn btn-warning">
                                            Lihat Selengkapnya 
                                        </button>
                                    </form>
                                    <!-- <a href="{{ route('siswa-pertemuan', $data->mapel) }}">Selengkapnya</a> -->
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        @endif
                        </table>
                    </div>
                </div><br>

                <div class="card">
                    <div class="card-header">Selasa</div>

                    <div class="card-body">
                        <table class="table">
                        @if($selasas == 0)
                            <thead class="center" style="width:100%; text-align: center;">
                                <td>Jam Pelajaran Kosong</td>
                            </thead>
                        @else
                            <thead>
                                <td style="width: 30%;">Mapel</td>
                                <td style="width: 30%;">Jam</td>
                                <td class="center" style="width: 40%;">Keterangan</td>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                            @if ($data->hari == 'Selasa')
                            <tr>
                                <td>{{ $data->mapel->mapel }}</td>
                                <td>{{ $data->waktu }}</td>
                                <td class="center">
                                    <form action="{{ route('siswa-pertemuan', $data->mapel) }}">
                                        <button type="submit" class="btn btn-warning">
                                            Lihat Selengkapnya 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        @endif
                        </table>
                    </div>
                </div><br>

                <div class="card">
                    <div class="card-header">Rabu</div>

                    <div class="card-body">
                        <table class="table">
                        @if($rabus == 0)
                            <thead class="center" style="width:100%; text-align: center;">
                                <td>Jam Pelajaran Kosong</td>
                            </thead>
                        @else
                            <thead>
                                <td style="width: 30%;">Mapel</td>
                                <td style="width: 30%;">Jam</td>
                                <td class="center" style="width: 40%;">Keterangan</td>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                            @if ($data->hari == 'Rabu')
                            <tr>
                                <td>{{ $data->mapel->mapel }}</td>
                                <td>{{ $data->waktu }}</td>
                                <td class="center">
                                    <form action="{{ route('siswa-pertemuan', $data->mapel) }}">
                                        <button type="submit" class="btn btn-warning">
                                            Lihat Selengkapnya 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        @endif
                        </table>
                    </div>
                </div><br>

                <div class="card">
                    <div class="card-header">Kamis</div>

                    <div class="card-body">
                        <table class="table">
                        @if($kamiss == 0)
                            <thead class="center" style="width:100%; text-align: center;">
                                <td>Jam Pelajaran Kosong</td>
                            </thead>
                        @else
                            <thead>
                                <td style="width: 30%;">Mapel</td>
                                <td style="width: 30%;">Jam</td>
                                <td class="center" style="width: 40%;">Keterangan</td>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                            @if ($data->hari == 'Kamis')
                            <tr>
                                <td>{{ $data->mapel->mapel }}</td>
                                <td>{{ $data->waktu }}</td>
                                <td class="center">
                                    <form action="{{ route('siswa-pertemuan', $data->mapel) }}">
                                        <button type="submit" class="btn btn-warning">
                                            Lihat Selengkapnya 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        @endif
                        </table>
                    </div>
                </div><br>

                <div class="card">
                    <div class="card-header">Jumat</div>

                    <div class="card-body">
                        <table class="table">
                        @if($jumats == 0)
                            <thead class="center" style="width:100%; text-align: center;">
                                <td>Jam Pelajaran Kosong</td>
                            </thead>
                        @else
                            <thead>
                                <td style="width: 30%;">Mapel</td>
                                <td style="width: 30%;">Jam</td>
                                <td class="center" style="width: 40%;">Keterangan</td>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                            @if ($data->hari == 'Jumat')
                            <tr>
                                <td>{{ $data->mapel->mapel }}</td>
                                <td>{{ $data->waktu }}</td>
                                <td class="center">
                                    <form action="{{ route('siswa-pertemuan', $data->mapel) }}">
                                        <button type="submit" class="btn btn-warning">
                                            Lihat Selengkapnya 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        @endif
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