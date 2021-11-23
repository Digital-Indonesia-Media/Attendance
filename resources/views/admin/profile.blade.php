@extends('layouts.app')

@section('title')
 Profile
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

  <li class="active">
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
		<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Profil Pengguna</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('admin-profile-update') }}" method="POST">
                  @csrf
                  <div>
                    <input type="hidden" name="id" hidden="" value="{{ Auth::user()->id }}">
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Sekolah (dibatasi)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="SMA Muhammadiyah 1 Taman">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Nama Panggilan (dibatasi)</label>
                        <input name="name" type="text" class="form-control" disabled="" placeholder="Username" value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email</label>
                        <input name="email" type="email" class="form-control" value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Peran (dibatasi)</label>
                        <input name="role" type="text" class="form-control" disabled="" placeholder="Role" value="{{ Auth::user()->role }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Catatan Diriku</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Disini bisa diisi dengan deskripsi dirimu" value="{{ Auth::user()->desc }}"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary">Perbarui</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">

              </div>
              <hr>
            </div>
          </div> -->

        </div>
@endsection