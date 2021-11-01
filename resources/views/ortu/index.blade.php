@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li class="active">
    <a href=" {{ route('ortu') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <!-- <li>
    <a href="{{ route('ortu-riwayat') }}">
      <i class="now-ui-icons education_agenda-bookmark"></i>
      <p>Riwayat Hadir</p>
    </a>
  </li> -->

  <li>
    <a href="{{ route('ortu-profile') }}">
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
    <div class="row">
        <div class="col-md-6">
            <a data-toggle="modal" data-target="#modalHadir">
                <div class="card" style="background-color: #20c997; min-height: 159.347px;">
                    <div class="row">
                            <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 40px;">
                                <i class="fas fa-user-check" style="font-size: 7rem; color: #fff;"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-header">
                                    <h2 class="card-category" style="color: #fff; font-size: 2em; margin-left: 25px;">Hadir</h2>
                                </div>

                                <div class="card-body" style="margin-left: 50%;">
                                    <h1 class="card-category" style="color: #fff; font-size: 3em;">{{ $hadir }}</h1>
                                </div>
                            </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a data-toggle="modal" data-target="#modalIzin">
                <div class="card" style="background-color: #17a2b8; min-height: 159.347px;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 40px;">
                            <i class="fas fa-user-injured" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">
                                <h2 class="card-category" style="color: #fff; font-size: 2em; margin-left: 40px;">Izin</h2>
                            </div>

                            <div class="card-body" style="margin-left: 50%;">
                                <h1 class="card-category" style="color: #fff; font-size: 3em;">{{ $izin }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a data-toggle="modal" data-target="#modalAlfa">
                <div class="card" style="background-color: #ed4973e6; min-height: 159.347px;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 40px;">
                            <i class="fas fa-user-times" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">
                                <h2 class="card-category" style="color: #fff; font-size: 2em; margin-left: 35px;">Alfa</h2>
                            </div>

                            <div class="card-body" style="margin-left: 50%;">
                                <h1 class="card-category" style="color: #fff; font-size: 3em;">{{ $alfa }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-category" style="color: #f96332;">Komentar</h2>
                </div>

                <div class="card-body">
                    <blockquote>
                        @if ($hadir > ( $izin + $alfa))
                            <p class="blockquote blockquote-primary">
                                "Dipertahanin kerajinan anaknya ya! :)"
                            </p>
                        @elseif ($izin > 5)
                            <p class="blockquote blockquote-primary">
                                "Ayo anaknya harus lebih semangat lagi belajarnya ya!"
                            </p>
                        @elseif ($alfa > 3)
                            <p class="blockquote blockquote-primary">
                                "Ayo anaknya jangan banyak alfa, nanti tidak naik kelas loh! :("
                            </p>
                        @else
                            <p class="blockquote blockquote-primary">
                                "Semangatt sekolah buat anaknyaa! :)"
                            </p>   
                        @endif

                        
                    </blockquote>
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
                <h5 class="modal-title" id="exampleModalLabel">Data Siswa Izin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <td>Mata Pelajaran</td>
                        <td>Pertemuan</td>
                        <td>Waktu</td>
                    </thead>
                    @foreach($hadirs as $hadir)
                    <tbody>
                        <td>{{ $hadir->mapel->mapel }}</td>
                        <td>{{ $hadir->pertemuan->pembahasan }}</td>
                        <td>{{ $hadir->updated_at }}</td>
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

<!-- Modal untuk data Izin -->
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
                        <td>Mata Pelajaran</td>
                        <td>Pertemuan</td>
                        <td>Waktu</td>
                    </thead>
                    @foreach($izins as $izin)
                    <tbody>
                        <td>{{ $izin->mapel->mapel }}</td>
                        <td>{{ $izin->pertemuan->pembahasan }}</td>
                        <td>{{ $izin->updated_at }}</td>
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

<!-- Modal untuk data Alfa -->
<div class="modal fade" id="modalAlfa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td>Mata Pelajaran</td>
                        <td>Pertemuan</td>
                        <td>Waktu</td>
                    </thead>
                    @foreach($alfas as $alfa)
                    <tbody>
                        <td>{{ $alfa->mapel->mapel }}</td>
                        <td>{{ $alfa->pertemuan->pembahasan }}</td>
                        <td>{{ $alfa->updated_at }}</td>
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