@extends('layouts.app')

@section('title')
Data Kelas
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li>
    <a href=" {{ route('guru') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li class="active">
    <a href="{{ route('guru-kelas', $tahunAjarans[0]->id) }}">
      <i class="fas fa-warehouse"></i>
      <p>Data Kelas</p>
    </a>
  </li>

  <li>
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
                    {{ $kelass->kelas }}
                </div>

                <div class="card-body">
                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <td>Nama</td>
                                <td>Masuk</td>
                                <td>Izin</td>
                                <td>Alfa</td>
                            </tdead>

                            <tbody>
                                <td style="width: 25%;">{{ $user->name }}</td>
                                <td style="width: 25%;"><button class="btn btn-warning" style="margin-top: 5px;" data-toggle="modal" data-target="#modalHadir">Lihat</button></td>
                                <td style="width: 25%;"><button class="btn btn-warning" style="margin-top: 5px;" data-toggle="modal" data-target="#modalIzin">Lihat</button></td>
                                <td style="width: 25%;"><button class="btn btn-warning" style="margin-top: 5px;" data-toggle="modal" data-target="#modalAlfa">Lihat</button></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal untuk data Hadir -->
<div class="modal fade" id="modalHadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Riwayat Hadir {{ $user->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <td>Mata Pelajaran</td>
                        <td>Pertemuan</td>
                        <td>Waktu</td>
                    </thead>
                    @foreach ($datas as $data)
                        @if ($data->status == 1)
                            <tbody>
                                <td>{{ $data->pertemuan->mapel }}</td>
                                <td>{{ $data->pertemuan->pertemuan_ke }}</td>
                                <td>{{ $data->pertemuan->updated_at }}</td>
                            </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk data Izin -->
<div class="modal fade" id="modalIzin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Siswa Izin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <td>Mata Pelajaran</td>
                        <td>Pertemuan</td>
                        <td>Waktu</td>
                    </thead>
                    @foreach ($datas as $data)
                        @if ($data->status == 2)
                            <tbody>
                                <td>{{ $data->pertemuan->mapel }}</td>
                                <td>{{ $data->pertemuan->pertemuan_ke }}</td>
                                <td>{{ $data->pertemuan->updated_at }}</td>
                            </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk data Alfa -->
<div class="modal fade" id="modalAlfa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Siswa Alfa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <td>Mata Pelajaran</td>
                        <td>Pertemuan</td>
                        <td>Waktu</td>
                    </thead>
                    @foreach ($datas as $data)
                        @if ($data->status == 0)
                            <tbody>
                                <td>{{ $data->pertemuan->mapel }}</td>
                                <td>{{ $data->pertemuan->pertemuan_ke }}</td>
                                <td>{{ $data->pertemuan->created_at }}</td>
                            </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
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
                    url: "{{route('user-delete')}}",
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