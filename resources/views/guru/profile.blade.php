@extends('layouts.app')

@section('title')
Pengguna
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

  <li>
    <a href="{{ route('guru-jadwal') }}">
      <i class="now-ui-icons education_agenda-bookmark"></i>
      <p>Jadwal</p>
    </a>
  </li>

  <li class="active">
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
		<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profil Pengguna</h5>
              </div>
              <div class="card-body">
                <form action="#" method="POST">
                  @csrf
                  @method('PUT')
                  <div>
                    <input type="hidden" name="id" hidden="" value="{{ Auth::user()->id }}">
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Sekolah (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="SMA Muhammadiyah 1 Taman">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Nama Panggilan</label>
                        <input name="username" type="text" class="form-control" placeholder="Username" value="{{ Auth::user()->name }}">
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
                        <label>Peran (disabled)</label>
                        <input name="role" type="text" class="form-control" disabled="" placeholder="Role" value="{{ Auth::user()->role }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tentang saya</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Deskripsi tentang dirimu" value="Mike"></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary">Perbarui</button>
                      </div>
                    </div>
                  </div> -->
                </form>
              </div>
            </div>
          </div>

          <!-- <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div> -->
          
        </div>
@endsection