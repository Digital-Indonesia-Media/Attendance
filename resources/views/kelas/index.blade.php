@extends('layouts.app')

@section('title')
Kelas
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
                        <p>Kelas</p>
                    </div>
                    <!-- Button trigger modal -->
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data
                        </button>
                    </div>                
                </div><br><br>

                <div class="card-body">
                    <div>
                        <form class="form" action="{{ route('kelas-store') }}" method="POST">
                            @csrf
                            <div>
                                <label>Kelas</label>
                                <input class="form-control" type="text" name="kelas" placeholder="Masukkan kelas" required="">
                                <br>
                            </div>
                            <div>
                                <label>Tapel</label>
                                <select name="tapel" class="form-control">
                                    <option value="" disabled selected hidden>Pilih Tahun Pelajaran</option>
                                    @foreach ($tahunAjarans as $tahunAjaran)
                                    <option value="{{ $tahunAjaran->tapel }}">{{ $tahunAjaran->tapel }}</option>
                                    @endforeach
                                </select>
                                <!-- <input class="form-control" type="text" name="tapel" placeholder="Masukkan tapel" required=""> -->
                                <br>
                            </div>
                            <button class="form-control btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>

                    <table class="table" style="margin-top: 50px;">
                        <thead>
                            <td>Data Kelas Setiap Tahun Pelajaran</td>
                            <td></td>
                        </thead>
                        @foreach ($tahunAjarans as $tahunAjaran)
                        <tbody>
                            <td style="width: 75%;">{{ $tahunAjaran->tapel }}</td>
                            <td style="width: 25%;">
                                <a href="{{ route('kelas-kelas', $tahunAjaran->id) }}">
                                    <button class="btn btn-success" style="width: 150px;">Lihat Data</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kelas-import') }}" method="POST" enctype="multipart/form-data">
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
                    url: "{{route('kelas-delete')}}",
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