@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li class="active">
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

  <li>
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
    <div class="row">
        <div class="col-md-6">
          <a href="{{ route('guru-kelas', $tahunAjarans[0]->id) }}">
            <div class="card" style="background-color: #20c997; min-height: 159.347px;">
                <div class="row">
                    <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 40px;">
                        <i class="fas fa-warehouse" style="font-size: 7rem; color: #fff;"></i>
                    </div>
                    <div class="col-md-8" style="padding: 0px 0px 0px 68px;">
                        <div class="card-header">
                            <h2 class="card-category" style="color: #fff; font-size: 1.3rem">Kelas</h2>
                        </div>

                        <div class="card-body" >
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('guru-jadwal') }}">
                <div class="card" style="background-color: #ffc107; min-height: 160px; color: #fff;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 60px;">
                            <i class="now-ui-icons education_agenda-bookmark" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8" style="padding: 0px 0px 0px 60px;">
                            <div class="card-header" style="color: #fff; font-size: 1.3rem">{{ __('Jadwal') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('guru-profile', $tahunAjarans[0]->id) }}">
                <div class="card" style="background-color: #007bff; min-height: 160px; color: #fff;">
                    <div class="row">
                        <div class="col-md-4" style="margin: 20px 0px 0px 0px; padding-left: 60px;">
                            <i class="fas fa-users" style="font-size: 7rem; color: #fff;"></i>
                        </div>
                        <div class="col-md-8" style="padding: 0px 0px 0px 50px;">
                            <div class="card-header" style="color: #fff; font-size: 1.3rem">{{ __('Profil Pengguna') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-category" style="color: #f96332;">Komentar</h5>
                </div>

                <div class="card-body">
                    <blockquote>
                        <p class="blockquote blockquote-primary">
                            "Ayo, lebih semangat lagi dalam mengajar!"
                        </p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection