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
    <a href="{{ route('tapel-index') }}">
      <i class="fab fa-trello"></i>
      <p>Tahun Pelajaran</p>
    </a>
  </li>

  <li>
    <a href="{{ route('mapel-index') }}">
      <i class="fas fa-book"></i>
      <p>Mata Pelajaran</p>
    </a>
  </li>

  <li>
    <a href="{{ route('kelas-index') }}">
      <i class="fas fa-warehouse"></i>
      <p>Kelas</p>
    </a>
  </li>

  <li>
    <a href="{{ route('admin-user') }}">
      <i class="fas fa-users"></i>
      <p>Pengguna</p>
    </a>
  </li>

  <li>
    <a href="{{ route('jadwal-index') }}">
      <i class="now-ui-icons education_agenda-bookmark"></i>
      <p>Jadwal</p>
    </a>
  </li>

  <li>
    <a href="{{ route('pertemuan-index') }}">
      <i class="fab fa-yelp"></i>
      <p>Pertemuan</p>
    </a>
  </li>

  <li>
    <a href="{{ route('kehadiran-index') }}">
      <i class="fas fa-tasks"></i>
      <p>Kehadiran</p>
    </a>
  </li>

  <li>
    <a href="{{ route('admin-profile') }}">
      <i class="now-ui-icons users_single-02"></i>
      <p>Profil Admin</p>
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
            <a href="{{ route('tapel-index') }}">
                <div class="card" style="background-color: #20c997; min-height: 160px; color: #fff;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 60px;">
                            <i class="fab fa-trello" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">{{ __('Tahun Pelajaran') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('mapel-index') }}">
                <div class="card" style="background-color: #f96332; min-height: 160px; color: #fff;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 60px;">
                            <i class="fas fa-book" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">{{ __('Mata Pelajaran') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('kelas-index') }}">
                <div class="card" style="background-color: #17a2b8; min-height: 160px; color: #fff;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 40px;">
                            <i class="fas fa-warehouse" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">{{ __('Kelas') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('admin-user') }}">
                <div class="card" style="background-color: #007bff; min-height: 160px; color: #fff;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 40px;">
                            <i class="fas fa-users" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">{{ __('Pengguna') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('jadwal-index') }}">
                <div class="card" style="background-color: #ffc107; min-height: 160px; color: #fff;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 60px;">
                            <i class="now-ui-icons education_agenda-bookmark" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">{{ __('Jadwal') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('pertemuan-index') }}">
                <div class="card" style="background-color: #e83e8c; min-height: 160px; color: #fff;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 75px;">
                            <i class="fab fa-yelp" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">{{ __('Pertemuan') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('kehadiran-index') }}">
                <div class="card" style="background-color: #20c997; min-height: 160px; color: #fff;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 50px;">
                            <i class="fas fa-tasks" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">{{ __('Kehadiran') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>        
    </div>
</div>
@endsection

@section('js')
    
@endsection