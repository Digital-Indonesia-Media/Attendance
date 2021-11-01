@extends('layouts.app')

@section('title')
Tahun Pelajaran
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
                <div class="card-header">{{ __('Tambahkan Tahun Pelajaran') }}</div>

                <div class="card-body">
                    <div>
                        <form class="form" action="{{ route('tapel-store') }}" method="POST">
                            @csrf
                            <div>
                                <label>Tahun Pelajaran</label>
                                <input type="text" name="tapel" class="form-control" placeholder="Masukkan tapel" required="">
                                <br>
                            </div>
                            <div>
                                <label>Tahun Pelajaran dimulai pada</label>
                                <input type="date" name="started_at" class="form-control" placeholder="Tahun Pelajaran akan dimulai pada tanggal" required="">
                                <br>
                            </div>
                            <button class="form-control btn btn-primary" type="submit">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div><br>

            @foreach ($tahunAjarans as $tahunAjaran)
            <a href="{{ route('tapel-desc', ['id' => $tahunAjaran->id]) }}">
                <div class="card" style="width: 100%;">
                    <div class="card-header" style="display: flex; width: 100%;">
                        <div style="width: 100%;">
                            <p style="margin: auto; padding: 7px;">Tapel {{ $tahunAjaran->tapel }}</p>
                        </div>
                        <div class="center" style="margin: auto; width: 50%;">
                            @if (($tahunAjaran->status) == 0)
                                <a href="{{ route('tapel-edit', $tahunAjaran->id) }}">
                                    <button class="btn btn-warning" style="width: 100px;">
                                        Edit
                                    </button>
                                </a>
                                <button onclick="hapus( {{ $tahunAjaran->id }}  )" class="btn btn-danger" style="width: 100px;">
                                    Hapus
                                </button>
                                <button onclick="publish( {{ $tahunAjaran->id }} )" class="btn btn-primary" style="width: 100px;">
                                    Publikasi
                                </button>
                            @elseif($tahunAjaran->status < 0)
                                <div style="margin: auto;">
                                    Tidak Berlaku
                                </div>
                            @elseif($tahunAjaran->status == 1)
                                <div style="margin: auto;">
                                    Aktif
                                </div>
                            @elseif($tahunAjaran->started_at != null)
                                <div style="margin: auto;">
                                    Mulai
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <input type="hidden" name="id" value="$tahunAjaran-id">
                    </div>
                </div><br>
            </a>
            @endforeach
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
        function publish(id){
            console.log('masukk');
            Swal.fire({
              title: 'Are you sure?',
              text: 'You wan\'t be able to delete this!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, publish it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{route('tapel-publish')}}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id:id
                    },
                    success: function (data) {
                        Swal.fire(
                          'Publish!',
                          'Your file has been published.',
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