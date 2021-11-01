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

  <li class="active">
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
                <div class="card-header">{{ __('Jadwal') }}</div>

                <div class="card-body">
                  <div class="content">
        						<form action="{{ route('jadwal-update') }}" method="POST">
        							@csrf
        							@method('PUT')
        							<input type="hidden" name="id" value="{{ $data->id }}">
        							<div>
                          <label>Tahun Pelajaran</label>
                          <select name="tapel_id" class="form-control">
                              <option value="{{ $data->tapel->id }}" selected hidden>{{ $data->tapel->tapel }}</option>
                              @foreach ($tahunAjarans as $tahunAjaran)
                              <option value="{{ $tahunAjaran->id }}">{{ $tahunAjaran->tapel }}</option>
                              @endforeach
                          </select>
                          <!-- <input class="form-control" type="text" name="tapel"> -->
                      </div><br>
                      <div>
                          <label>Kelas</label>
                          <select name="kelas_id" class="form-control">
                              <option value="{{ $data->kelas->id }}" selected hidden>{{ $data->kelas->kelas }}</option>
                              @foreach ($kelass as $kelas)
                              <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                              @endforeach
                          </select>
                      </div><br>
                      <div>
                          <label>Mata Pelajaran</label>
                          <select name="mapel_id" class="form-control">
                              <option value="{{ $data->mapel->id }}" selected hidden>{{ $data->mapel->mapel }}</option>
                              @foreach ($mapels as $mapel)
                              <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
                              @endforeach
                          </select>
                      </div><br>
                      <div>
                          <label>Hari</label>
                          <select name="hari" class="form-control">
                              <option value="{{ $data->hari }}" selected hidden>{{ $data->hari }}</option>
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                          </select>
                      </div><br>
                      <div>
                          <label>Waktu</label>
                          <input class="form-control" type="text" class="form-control" type="time" name="waktu" value="{{ $data->waktu }}">
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