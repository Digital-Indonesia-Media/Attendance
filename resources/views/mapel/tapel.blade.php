@extends('layouts.app')

@section('title')
Mata Pelajaran
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

  <li class="active">
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
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        @if ($datas == 0)
                        <div style="color: #f96332;">
                            Mata Pelajaran Masih Belum Tersedia
                        </div>
                        @else
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <th>Mata Pelajaran</th>
                                <th>Status</th>
                                <th>Tahun Pelajaran</th>
                                <th class="center">Aksi</th>
                            </thead>
                            @foreach ($mapels as $mapel)
                            <tbody>
                                <td>{{ $mapel->mapel }}</td>

                                @if (($mapel->status) == 1)
                                <td>
                                    Aktif
                                </td>
                                @elseif (($mapel->status) == 0)
                                <td>
                                    Tidak Aktif
                                </td>
                                @endif

                                <td>{{ $mapel->tapel }}</td>
                                <td class="center">
                                    <a href="{{ route('mapel-edit', $mapel->id) }}"><button class="btn btn-warning margin" style="width: 110px; margin-top: 5px;">Edit</button></a>
                                    <button class="btn btn-danger margin" style="width: 110px; margin-top: 5px;" onclick="hapus({{ $mapel->id }})">Delete</button>
                                    @if (($mapel->status) == 1)
                                    <form class="margin" action="{{ route('mapel-nonActive') }}" method="POST">
                                      @csrf
                                      <button class="btn btn-primary">Non-Active</button>
                                    </form>
                                    @elseif (($mapel->status) == 0)
                                    <form class="margin" action="{{ route('mapel-active') }}" method="POST">
                                      @csrf
                                      <button class="btn btn-primary">Active</button>
                                    </form>
                                    @endif
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                        @endif
                        
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mapel-import') }}" method="POST" enctype="multipart/form-data">
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
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
        function hapus(id) {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('mapel-delete') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function (data) {
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                        location.reload()
                    },
                    error: function (error) {
                        console.log(error);
                        console.log(error.responseText);
                        Swal.fire(
                          'Error!',
                          'Terjadi kesalahan',
                          'error'
                        )
                    }       
                });              
               }
            })
        }
    </script>
@endsection