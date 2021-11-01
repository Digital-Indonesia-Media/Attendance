@extends('layouts.app')

@section('title')
Data Kelas
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li>
    <a href=" {{ route('guru') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li class="active">
    <a href="{{ route('guru-kelas', $kelass[0]->id) }}">
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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Kelas
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach ($kelass as $kelas)
                        <tbody>
                            <td style="width: 50%;">{{ $kelas->kelas }}</td>
                            <td style="width: 50%;">
                                <a style="color: #fff;" href="{{ route('guru-perkelas', $kelas->id) }}">
                                    <button type="button" class="btn btn-primary">Lihat Selengkapnya</button>
                                </a>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection