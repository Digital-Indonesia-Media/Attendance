@extends('layouts.app')

@section('title')
Pengguna
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

  <li class="active">
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pengguna') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content">
                        <form action="{{ route('user-update', ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $data->id }}">
              <div>
                  <div>
                      <label>Name</label>
                      <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                  </div>
                  <br>

                  <div>
                      <label>Email</label>
                      <input class="form-control" type="email" name="email" value="{{ $data->email }}">
                  </div>
                  <br>

                  <div>
                      <label for="role">Role</label>
                      <select class="form-control" id="role" name="role">
                          <option value="siswa">Siswa</option>
                          <option value="guru">Guru</option>
                      </select>
                      <!-- <input class="form-control" type="text" name="role"> -->
                  </div>
                  <br>

                  <button class="form-control btn btn-primary">Perbarui</button>
              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src=" {{ asset('js/jquery-3.4.1.min.js') }} "></script>
    <script src=" {{ asset('js/sweetalert2.all.min.js') }} "></script>
    <script>
        function hapus(id){
            Swal.fire({
              title: 'Apakah kamu yakin?',
              text: 'Kamu tidak dapat memulihkan ini kembali!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, hapus saja!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{route('kehadiran-delete')}}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id:id
                    },
                    success: function (data) {
                        Swal.fire(
                          'Terhapus!',
                          'File anda telah berhasil dihapus.',
                          'Berhasil'
                        );
                        location.reload()
                    }         
                });
              }
            })
        }
    </script>
@endsection