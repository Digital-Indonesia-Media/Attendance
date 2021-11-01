@extends('layouts.app')

@section('title')
Jadwal
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li>
    <a href=" {{ route('guru') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li>
    <a href="{{ route('guru-kelas', $tahunAjarans[0]->id) }}">
      <i class="fas fa-warehouse"></i>
      <p>Data Kelas</p>
    </a>
  </li>

  <li class="active">
    <a href="{{ route('guru-jadwal') }}">
      <i class="now-ui-icons education_agenda-bookmark"></i>
      <p>Jadwal</p>
    </a>
  </li>

  <li>
    <a href="{{ route('guru-profile') }}">
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Jadwal <label style="color: #f96332;">{{ $datas[0]->mapel->mapel }}</label></div>

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
                                    <td style="width: 30%;">Kelas</td>
                                    <td style="width: 30%;">Waktu</td>
                                    <td class="center" style="width: 40%;">Keterangan</td>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Senin')
                                <tr>
                                    <td>{{ $data->kelas->kelas }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td class="center">
                                        <form action="{{ route('guru-pertemuan', $data->id) }}">
                                            <input type="hidden" name="kelas_id" value="{{ $data->kelas_id }}">
                                            <button type="submit" class="btn btn-warning">
                                                Atur Pertemuan 
                                            </button>
                                        </form>
                                        <!-- <a href="{{ route('guru-pertemuan', $data->id) }}">Selengkapnya</a> -->
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">Selasa</div>

                        <div class="card-body">
                            <table class="table">
                            @if($selasas == 0)
                                <thead class="center" style="width:100%; text-align: center;">
                                    <td>Tidak ada jam mengajar</td>
                                </thead>
                            @else
                                <thead>
                                    <td style="width: 30%;">Kelas</td>
                                    <td style="width: 30%;">Waktu</td>
                                    <td class="center" style="width: 40%;">Keterangan</td>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Selasa')
                                <tr>
                                    <td>{{ $data->kelas->kelas }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td class="center">
                                        <form action="{{ route('guru-pertemuan', $data->id) }}">
                                            <input type="hidden" name="kelas_id" value="{{ $data->kelas_id }}">
                                            <button type="submit" class="btn btn-warning">
                                                Atur Pertemuan 
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">Rabu</div>

                        <div class="card-body">
                            <table class="table">
                            @if($rabus == 0)
                                <thead class="center" style="width:100%; text-align: center;">
                                    <td>Tidak ada jam mengajar</td>
                                </thead>
                            @else
                                <thead>
                                    <td style="width: 30%;">Kelas</td>
                                    <td style="width: 30%;">Waktu</td>
                                    <td class="center" style="width: 40%;">Keterangan</td>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Rabu')
                                    <tr>
                                        <td>{{ $data->kelas->kelas }}</td>
                                        <td>{{ $data->waktu }}</td>
                                        <td class="center">
                                            <form action="{{ route('guru-pertemuan', $data->id) }}">
                                                <input type="hidden" name="kelas_id" value="{{ $data->kelas_id }}">
                                                <button type="submit" class="btn btn-warning">
                                                    Atur Pertemuan 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">Kamis</div>

                        <div class="card-body">
                            <table class="table">
                            @if($kamiss == 0)
                                <thead class="center" style="width:100%; text-align: center;">
                                    <td>Tidak ada jam mengajar</td>
                                </thead>
                            @else
                                <thead>
                                    <td style="width: 30%;">Kelas</td>
                                    <td style="width: 30%;">Waktu</td>
                                    <td class="center" style="width: 40%;">Keterangan</td>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Kamis')
                                <tr>
                                    <td>{{ $data->kelas->kelas }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td class="center">
                                        <form action="{{ route('guru-pertemuan', $data->id) }}">
                                            <input type="hidden" name="kelas_id" value="{{ $data->kelas_id }}">
                                            <button type="submit" class="btn btn-warning">
                                                Atur Pertemuan 
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">Jumat</div>

                        <div class="card-body">
                            <table class="table">
                            @if($jumats == 0)
                                <thead class="center" style="width:100%; text-align: center;">
                                    <td>Tidak ada jam mengajar</td>
                                </thead>
                            @else
                                <thead>
                                    <td style="width: 30%;">Kelas</td>
                                    <td style="width: 30%;">Waktu</td>
                                    <td class="center" style="width: 40%;">Keterangan</td>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                @if ($data->hari == 'Jumat')
                                <tr>
                                    <td>{{ $data->kelas->kelas }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td class="center">
                                        <form action="{{ route('guru-pertemuan', $data->id) }}">
                                            <input type="hidden" name="kelas_id" value="{{ $data->kelas_id }}">
                                            <button type="submit" class="btn btn-warning">
                                                Atur Pertemuan 
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            @endif
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