@extends('layouts.app')

@section('title')
Pertemuan
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li>
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

  <li class="active">
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
                <div class="card-header">
                    {{ __('Pertemuan') }}
                </div>

                <div class="card-body">
                    <div>
                        <form class="form" action="{{ route('pertemuan-update') }}" method="POST">
                            @csrf
                            <div>
                                <label>Mata Pelajaran</label>
                                <input name="mapel" class="form-control" value="{{ $data->mapel }}">
                            </div><br>
                            <div>
                                <label>Pertemuan Ke-</label>
                                <input type="number" name="pertemuan_ke" class="form-control" value="{{ $data->pertemuan_ke }}">
                                <br>
                            </div>
                            <div>
                                <label>Pembahasan</label>
                                <input name="pembahasan" class="form-control" value="{{ $data->pembahasan }}">
                                <br>
                            </div>

                            <input type="id" name="id" hidden="" value="{{ $data->id }}">
                            <button class="form-control btn btn-primary" type="submit">Perbarui</button>
                        </form><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection