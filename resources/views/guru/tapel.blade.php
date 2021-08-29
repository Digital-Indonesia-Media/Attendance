@extends('layouts.app')

@section('title')
Data Kelas
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
    <a href="{{ route('guru-kelas') }}">
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($tahunAjarans as $tahunAjaran)
            <a href="{{ route('guru-kelas', $tahunAjaran->id) }}">
                <div class="card">
                    <div class="card-header" style="display: flex; ">
                        <div>
                            <p style="margin: auto; padding: 7px;">Tapel {{ $tahunAjaran->tapel }}</p>
                        </div>
                    </div>

                    <div class="card-body">
                        <input type="hidden" name="id" value="$tahunAjaran-id">
                    </div>
                </div><br>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection