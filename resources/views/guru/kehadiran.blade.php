@extends('layouts.app')

@section('title')
Kehadiran Siswa
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
                <div class="card-header">
                    <p>Kehadiran Siswa</p>
                    <div class="float-right" style="margin: 5px;">
                        <div class="top">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalHadir">
                                <p style="margin: auto;">Hadir : {{ $hadir }}</p>
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalIzin">
                                <p style="margin: auto;">Izin : {{ $izin }}</p>
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAlfa">
                                <p style="margin: auto;">Alfa : {{ $alfa }}</p>
                            </button>
                        </div>
                        <div class="bottom">
                            <a href="{{ route('download-kehadiran', $kehadirans[0]->pertemuan_id) }}">
                                <button style="width:100%;" type="button" class="btn btn-primary">
                                    <p style="margin: auto;">Ambil Data</p>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <td class="center">Nama</td>
                            <td class="center">Status</td>
                        </thead>
                        @foreach($kehadirans as $kehadiran)
                        <tbody>
                            <td class="center">{{ $kehadiran->user->name }}</td>
                            @if ($kehadiran->status == 1)
                                <td class="center">
                                    <p style="color:#f96332; padding-top: 17px;">Hadir</p>
                                </td>
                            @elseif ($kehadiran->status == 2)
                                <td class="center">
                                    <p style="color:#f96332; padding-top: 17px;">Izin</p>
                                </td>
                            @elseif ($kehadiran->status == 3)
                                <td class="center">
                                    <button class="btn btn-warning" style="margin-top: 5px;" data-toggle="modal" data-target="#ModalIzin">Mengajukan Izin</button>
                                </td>
                                <!-- Modal untuk izin -->
                                    <div class="modal fade" id="ModalIzin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Mengajukan Izin</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        
                                                        <div class="form-group">
                                                            <label style="text-align: left!important;">Alasan</label>
                                                            <input class="form-control" type="text" name="kode" required="" value="{{ $kehadiran->izin }}" disabled="">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('guru-pertemuan-izin-terima', $kehadiran->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-success">Izinkan</button>
                                                    </form>

                                                    <form action="{{ route('guru-pertemuan-izin-tolak', $kehadiran->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger">Tolak Izin</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @else ($kehadiran->status == 0)
                                <td class="center">
                                    <p style="color:#f96332; padding-top: 17px;">Alfa</p>
                                </td>
                            @endif
                        </tbody>
                        @endforeach
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk data Hadir -->
<div class="modal fade" id="modalHadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Siswa Hadir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <td>Nama</td>
                    </thead>
                    @foreach ($hadirs as $hadir)
                    <tbody>
                        <td>{{ $hadir->user->name }}</td>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk data Hadir -->
<div class="modal fade" id="modalIzin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Siswa Izin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <td>Nama</td>
                    </thead>
                    @foreach ($izins as $izin)
                    <tbody>
                        <td>{{ $izin->user->name }}</td>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk data Hadir -->
<div class="modal fade" id="modalAlfa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Siswa Alfa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <td>Nama</td>
                    </thead>
                    @foreach ($alfas as $alfa)
                    <tbody>
                        <td>{{ $alfa->user->name }}</td>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection