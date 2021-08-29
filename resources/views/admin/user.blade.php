@extends('layouts.app')

@section('title')
User
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li>
    <a href=" {{ route('admin') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li>
    <a href="{{ route('admin-profile') }}">
      <i class="now-ui-icons users_single-02"></i>
      <p>User Profile</p>
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
                                <a href="#">Lihat Selengkapnya...</a>
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