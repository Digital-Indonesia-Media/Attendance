@extends('layouts.app')

@section('title')
Tapel
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
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Mapel
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach ($mapels as $mapel)
                        <tbody>
                            <td>{{ $mapel->mapel }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
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
                                <a href="{{ route('tapel-nameStudent', ['id' => $kelas->id, 'kelas' => $kelas->kelas]) }}">Lihat Selengkapnya...</a>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Jadwal
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <td class="center">Hari</td>
                            <td class="center">Waktu</td>
                            <td class="center">Kelas</td>
                            <td class="center">Mata Pelajaran</td>
                            <td class="center">Minggu Ke-</td>
                            <td class="center">Aksi</td>
                        </thead>

                        @foreach ($datas as $data)
                        <tbody>
                            <td class="center">{{ $data->hari }}</td>
                            <td class="center">{{ $data->waktu }}</td>
                            <td class="center">{{ $data->kelas->kelas }}</td>
                            <td class="center">{{ $data->mapel->mapel }}</td>
                            <td class="center">{{ $data->minggu }}</td>
                            <td class="center">
                                <a href="{{ route('jadwal-edit', $data->id) }}">
                                    <button class="btn btn-sm btn-warning">
                                        Edit
                                    </button>
                                </a>
                                <button onclick="hapus( {{$data->id}}  )" class="btn btn-sm btn-danger">
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
@endsection

@section('js')
    <script src=" {{ asset('js/jquery-3.4.1.min.js') }} "></script>
    <script src=" {{ asset('js/sweetalert2.all.min.js') }} "></script>
    <script>
        function hapus(id){
            Swal.fire({
              title: 'Are you sure?',
              text: 'You wan\'t be able to revert this!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{route('tapel-delete')}}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id:id
                    },
                    success: function (data) {
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        );
                        location.reload()
                    }         
                });
              }
            })
        }
    </script>
@endsection