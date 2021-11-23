@extends('layouts.app')

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

  <li class="active">
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
                        <p> Tambahkan Jadwal</p>
                    </div>     
                    <!-- Button trigger modal -->
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Import Data
                        </button>
                    </div>   
                </div>

                <div class="card-body">
                    <div>
                        <form class="form" action="{{ route('jadwal-store') }}" method="POST" style="padding-top: 50px;">
                            @csrf
                            <input type="hidden" name="tapel_id" value="{{ $tahunAjarans->id }}">
                            <input type="hidden" name="kelas_id" value="{{ $kelass->id }}">
                            <div>
                                <label>Mata Pelajaran</label>
                                <select name="mapel_id" class="form-control" required="">
                                    <option value="" disabled selected hidden>Pilih Mata Pelajaran</option>
                                    @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div>
                                <label>Nama Guru Yang Mengajar</label>
                                <select name="guru_id" class="form-control" required="">
                                    <option value="" disabled selected hidden>Pilih Nama Guru</option>
                                    @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div>
                                <label>Hari</label>
                                <select name="hari" class="form-control" required="">
                                    <option value="" disabled selected hidden>Pilih Hari Jadwal</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </div><br>
                            <div>
                                <label>Waktu</label>
                                <input class="form-control" type="time" name="waktu" required="">
                            </div><br>
                            
                            <button class="form-control btn btn-primary" type="submit">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <p>Jadwal {{ $kelass->kelas }}</p>
                    </div>     
                </div>

                <div class="card-body">
                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <td class="center">Hari</td>
                                <td class="center">Mata Pelajaran</td>
                                <td class="center">Jam</td>
                                <td class="center">Aksi</td>
                            </thead>

                            @foreach ($datas as $data)
                            <tbody>
                                <td class="center">{{ $data->hari }}</td>
                                <td class="center">{{ $data->mapel->mapel }}</td>
                                <td class="center">{{ $data->waktu }}</td>
                                <td class="center">
                                    <a href="{{ route('jadwal-edit', $data->id) }}">
                                        <button class="btn btn-warning" style="width: 100px; margin: 5px;">
                                            Edit 
                                        </button>
                                    </a>
                                    <button onclick="hapus( {{$data->id}}  )" class="btn btn-danger" style="width: 100px; margin: 5px;">
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

<!-- Modal untuk tambah data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jadwal-import') }}" method="POST" enctype="multipart/form-data">
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
                    url: "{{route('jadwal-delete')}}",
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