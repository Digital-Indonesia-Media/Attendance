@extends('layouts.app')

@section('title')
Pertemuan
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

  <li class="active">
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
                        <p>Tambahkan Pertemuan</p>
                    </div>
                    <!-- Button trigger modal -->
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Import Data
                        </button>
                    </div>  
                </div>

                <div class="card-body">
                    <!-- <div>
                        <form class="form" action="{{ route('pertemuan-store') }}" method="POST" style="padding-top: 50px;">
                            @csrf
                            <div>
                                <label>Mata Pelajaran</label>
                                <select name="mapel" class="form-control">
                                    <option value="" disabled selected hidden>Pilih Mata Pelajaran</option>
                                    @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->mapel }}">{{ $mapel->mapel }}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div>
                                <label>Pertemuan Ke-</label>
                                <input type="number" name="pertemuan_ke" class="form-control" placeholder="Masukkan pertemuan keberapa">
                                <br>
                            </div>
                            <div>
                                <label>Pembahasan</label>
                                <input name="pembahasan" class="form-control" placeholder="Masukkan pembahasan">
                                <br>
                            </div>
                                <button class="form-control btn btn-primary" type="submit">Tambahkan</button>
                        </form><br>

                        <div> -->
                            <table class="table" style="margin-top: 25px;">
                                <thead>
                                    <th>Tapel</th>
                                    <th class="center">Keterangan</th>
                                </thead>
                                @foreach ($tahunAjarans as $tahunAjaran)
                                <tbody>
                                    <td>{{ $tahunAjaran->tapel }}</td>
                                    <td class="center">
                                        <a href="{{ route('pertemuan-tapel', $tahunAjaran->id) }}"><button class="btn btn-primary">Pergi</button></a>
                                    </td>
                                </tbody>
                                @endforeach
                            </table>
                        </div>

                        <!-- <table class="table">
                            <thead>
                                <td class="center">Pertemuan Ke-</td>
                                <td class="center">Mata Pelajaran</td>
                                <td class="center">Pembahasan</td>
                                <td class="center">Aksi</td>
                            </thead>
                            @foreach($pertemuans as $pertemuan)
                            <tbody>
                                <td class="center">{{ $pertemuan->pertemuan_ke }}</td>
                                <td class="center">{{ $pertemuan->mapel }}</td>
                                <td class="center">{{ $pertemuan->pembahasan }}</td>
                                <td class="center">
                                    <a href="{{ route('pertemuan-edit', $pertemuan->id) }}">
                                        <button class="btn btn-warning">
                                            Edit
                                        </button>
                                    </a>
                                    <button onclick="hapus( {{$pertemuan->id}}  )" class="btn btn-danger">
                                        Delete
                                    </button>
                                </td>
                            </tbody>
                            @endforeach
                        </table> -->
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pertemuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pertemuan-import') }}" method="POST" enctype="multipart/form-data">
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
                    url: "{{route('pertemuan-delete')}}",
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