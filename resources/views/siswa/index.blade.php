@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li class="active">
    <a href=" {{ route('siswa') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li>
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
    <div class="row">
        <div class="col-md-6">
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
        </div>

        <div class="col-md-6">
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
        </div>

        <div class="col-md-6">
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
                                "Dipertahanin rajinnya ya! :)"
                            </p>
                        @elseif ($izin > 5)
                            <p class="blockquote blockquote-primary">
                                "Ayo lebih semangat lagi belajarnya ya!"
                            </p>
                        @elseif ($alfa > 3)
                            <p class="blockquote blockquote-primary">
                                "Ayo jangan banyak alfa, nanti tidak naik kelas loh! :("
                            </p>
                        @else
                            <p class="blockquote blockquote-primary">
                                "Semangatt sekolahnyaa!"
                            </p>   
                        @endif

                        
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection