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

  <li  class="active">
    <a href="{{ route('kehadiran-index') }}">
      <i class="fas fa-tasks"></i>
      <p>Kehadiran</p>
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
                    <div class="float-left">
                        <p>Kehadiran</p>
                    </div>
                </div><br><br>

                <div class="card-body">
                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <td>Nama</td>
                                <td>Kelas</td>
                                <td>Mapel</td>
                                <td>Pertemuan</td>
                                <td>Status</td>
                                <td class="center">Aksi</td>
                            </tdead>

                            @foreach ($datas as $data)
                            <tbody>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->kelas->kelas }}</td>
                                <td>{{ $data->mapel->mapel }}</td>
                                <td>{{ $data->pertemuan->pertemuan_ke }}</td>
                                <td>{{ $data->status }}</td>
                                <td class="center">
                                    <!-- <a href="{{ route('kehadiran-edit', $data->id) }}">
                                        <button class="btn btn-warning">
                                            Edit
                                        </button>
                                    </a> -->
                                    <button onclick="hapus( {{$data->id}}  )" class="btn btn-danger" style="width: 85px; margin-top: 5px;">
                                        Delete
                                    </button>
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
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