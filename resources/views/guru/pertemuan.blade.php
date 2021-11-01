@extends('layouts.app')

@section('title')
Jadwal
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li>
    <a href=" {{ route('guru') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li>
    <a href="{{ route('guru-kelas', $tahunAjarans[0]->id) }}">
      <i class="fas fa-warehouse"></i>
      <p>Data Kelas</p>
    </a>
  </li>

  <li class="active">
    <a href="{{ route('guru-jadwal') }}">
      <i class="now-ui-icons education_agenda-bookmark"></i>
      <p>Jadwal</p>
    </a>
  </li>

  <li>
    <a href="{{ route('guru-profile') }}">
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
                    Pertemuan {{ $mapels->mapel }} {{ $kelas_id->kelas }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <form class="form" action="{{ route('guru-pertemuan-store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kelas_id" value="{{ $kelas_id->id }}">
                            <div>
                                <label>Mapel</label>
                                <input type="text" name="mapel" class="form-control" value="{{ $mapels->mapel }}">
                            </div><br>
                            <div>
                                <label>Pertemuan Ke-</label>
                                <input type="number" name="pertemuan_ke" class="form-control" placeholder="Masukkan pertemuan keberapa">
                            </div><br>
                            <div>
                                <label>Pembahasan</label>
                                <input name="pembahasan" class="form-control" placeholder="Masukkan pembahasan">
                            </div><br>
                                <button class="form-control btn btn-primary" type="submit">Tambahkan</button>
                        </form><br>

                        <table class="table">
                            <thead>
                                <td class="center">Pertemuan Ke-</td>
                                <td class="center">Pembahasan</td>
                                <td class="center">Aksi</td>
                            </thead>
                            @foreach($pertemuans as $pertemuan)
                            <tbody>
                                <td class="center">{{ $pertemuan->pertemuan_ke }}</td>
                                <td class="center">{{ $pertemuan->pembahasan }}</td>
                                <td class="center">
                                    @if ($pertemuan->status == 1)
                                    <input class="form-control center" style="width: 150px; margin-top: 5px; display: inherit!important;" type="text" name="code" value="{{$pertemuan->code}}">
                                    <a href="{{ route('guru-kehadiran-siswa', $pertemuan->id) }}"><button class="btn btn-success center" style="margin: 5px 0px 0px 5px;">
                                        Lihat Kehadiran Siswa
                                    </button></a>
                                    @else
                                    <form action="{{route('guru-pertemuan-publish')}}" method="POST">
                                        @csrf
                                        <a href="{{ route('guru-pertemuan-edit', $pertemuan->id) }}">
                                            <button class="btn btn-warning" style="width: 100px; margin-top: 5px;">
                                                Edit
                                            </button>
                                        </a>
                                        <button onclick="hapus( {{$pertemuan->id}}  )" class="btn btn-danger" style="width: 100px; margin-top: 5px;">
                                            Delete
                                        </button>
                                            
                                        <button onclick="publish( {{$pertemuan->id}} )" class="btn btn-primary" style="width: 100px; margin-top: 5px;">
                                            Publish
                                        </button>
                                    @endif
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
                    url: "{{route('guru-pertemuan-delete')}}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id:id,
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
        function publish(id){
            Swal.fire({
              title: 'Apakah kamu yakin?',
              text: 'Setelah kamu menerbitkan, file ini tidak dapat dihapus!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, terbitkan!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{route('guru-pertemuan-publish')}}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id:id,
                    },
                    success: function (data) {
                        Swal.fire(
                          'Publish!',
                          'File anda telah berhasil dipublish.',
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