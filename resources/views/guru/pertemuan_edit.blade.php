Profil Pengguna@extends('layouts.app')

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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Pertemuan') }}
                </div>

                <div class="card-body">
                    <div>
                        <form class="form" action="{{ route('guru-pertemuan-update', $data->id) }}" method="POST">
                            @csrf
                            <div>
                                <label>Mapel</label>
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
                            <button class="form-control btn btn-primary" type="submit">Update</button>
                        </form><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection