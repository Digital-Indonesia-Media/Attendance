@extends('layouts.app')

@section('title')
Tahun Pelajaran
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
    <a href="{{ route('admin-user') }}">
      <i class="fas fa-users"></i>
      <p>Pengguna</p>
    </a>
  </li>

  <li>
    <a href="{{ route('kelas-index') }}">
      <i class="fas fa-warehouse"></i>
      <p>Kelas</p>
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
    <a href="{{ route('admin-profile') }}">
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
                <div class="card-header">Tahun Pelajaran {{$data->tapel}}</div>

                <div class="card-body">
                    <div class="content">
						<form action="{{ route('tapel-update') }}" method="POST">
							@csrf
							@method('PUT')
							<input type="hidden" name="id" value="{{ $data->id }}">
                            <div>
                                <label>Tahun Pelajaran</label>
							     <input class="form-control" type="text" name="tapel" value="{{ $data->tapel }}">
                            </div><br>
                            <div>
                                <label>Tahun Pelajaran Dimulai Pada</label>
                                <input type="date" name="started_at" class="form-control" value="{{ $data->started_at }}">
                            </div><br>
							<button class="form-control btn btn-primary">Perbarui</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection