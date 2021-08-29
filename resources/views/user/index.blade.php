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

  <li class="active">
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
                <div class="card-header">
                    <div class="float-left">
                        <p>Tambahkan Pengguna</p>
                    </div>
                    <!-- Button trigger modal -->
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Import Data
                        </button>
                    </div>       
                </div><br><br>

                <div class="card-body">
                    <div>
                        <form class="form" action="{{ route('user-store') }}" method="POST">
                            @csrf
                            <div>
                                <div>
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" type="text" name="name" required="" placeholder="Masukkan Nama">
                                </div>
                                <br>

                                <div>
                                    <label for="role">Kelas</label>
                                    <select class="form-control" id="kelas" name="kelas" required="">
                                        @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->kelas}}">{{ $kelas->kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <div>
                                    <label for="role">Tahun Pelajaran</label>
                                    <select class="form-control" id="kelas" name="kelas" required="">
                                        @foreach($tapels as $tapel)
                                        <option value="{{ $tapel->tapel }}">{{ $tapel->tapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <div>
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" required="" placeholder="Masukkan Alamat Email">
                                </div>
                                <br>

                                <div>
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" required="" placeholder="Masukkan Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>

                                <div>
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" required="" placeholder="Masukkan Kembali Password">
                                </div>
                                <br>

                                <div>
                                    <label for="role">Peranan</label>
                                    <select class="form-control" id="role" name="role" required="">
                                        <option value="siswa">Siswa</option>
                                        <option value="guru">Guru</option>
                                    </select>
                                    <!-- <input class="form-control" type="text" name="role"> -->
                                </div>
                                <br>

                                <button class="form-control btn btn-primary" type="submit">Tambahkan</button>
                            </div>
                        </form>
                    </div>

                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <td>Nama</td>
                                <td>Peranan</td>
                                <td>Gmail</td>
                                <td class="center">Aksi</td>
                            </tdead>

                            @foreach ($datas as $data)
                            <tbody>
                                <td style="width: 35%;">{{ $data->name }}</td>
                                <td style="width: 20%;">{{ $data->role }}</td>
                                <td style="width: 20%;">{{ $data->email }}</td>
                                <td class="center" style="width: 25%;">
                                    <a href="{{ route('user-edit', $data->id) }}">
                                        <button class="btn btn-warning" style="width: 85px; margin-top: 5px;">
                                            Edit
                                        </button>
                                    </a>
                                    <button onclick="hapus( {{$data->id}}  )" class="btn btn-danger" style="width: 85px; margin-top: 5px;">
                                        Delete
                                    </button>
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>

                    <table class="table" style="margin-top: 50px;">
                        <thead>
                            <td>Data Pengguna Setiap Tahun Pelajaran</td>
                            <td></td>
                        </thead>
                        @foreach ($tapels as $tapel)
                        <tbody>
                            <td style="width: 75%;">{{ $tapel->tapel }}</td>
                            <td style="width: 25%;">
                                <a href="{{ route('user-index', $tapel->id) }}">
                                    <button class="btn btn-success" style="width: 150px;">Pergi</button>
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

<!-- Modal untuk tambah data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user-import') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                        <input type="file" name="file" required="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Akhir modal -->
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
                    url: "{{route('user-delete')}}",
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