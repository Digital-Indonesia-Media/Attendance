@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tapel {{ $tahunAjarans->tapel }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            Mapel
                        </div>
                        <div class="card-body">
                            <table class="table">
                                @foreach ($mapels as $mapel)
                                <tbody>
                                    <th>{{ $mapel->mapel }}</th>
                                    <th style="width: 50%;">
                                        <a href="{{ route('tapel-pertemuan', ['id' => $mapel->id, 'mapel' => $mapel->mapel]) }}">Lihat Selengkapnya...</a>
                                    </th>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">
                            Kelas
                        </div>
                        <div class="card-body">
                            <table class="table">
                                @foreach ($kelass as $kelas)
                                <tbody>
                                    <th style="width: 50%;">{{ $kelas->kelas }}</th>
                                    <th style="width: 50%;">
                                        <a href="{{ route('tapel-nameStudent', ['id' => $kelas->id, 'kelas' => $kelas->kelas]) }}">Lihat Selengkapnya...</a>
                                    </th>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">
                            Jadwal
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <th class="center">No</th>
                                <th class="center">Tahun Pelajaran</th>
                                <th class="center">Kelas</th>
                                <th class="center">Mata Pelajaran</th>
                                <th class="center">Hari</th>
                                <th class="center">Waktu</th>
                                <th class="center">Minggu Ke-</th>
                                <th class="center">Aksi</th>
                            </thead>

                            @foreach ($datas as $data)
                            <tbody>
                                <th class="center">{{ $data->id }}</th>
                                <th class="center">{{ $data->tapel->tapel }}</th>
                                <th class="center">{{ $data->kelas->kelas }}</th>
                                <th class="center">{{ $data->mapel->mapel }}</th>
                                <th class="center">{{ $data->hari }}</th>
                                <th class="center">{{ $data->waktu }}</th>
                                <th class="center">{{ $data->minggu }}</th>
                                <th class="center">
                                    <button class="btn btn-sm btn-warning">
                                        <a href="{{ route('jadwal-edit', $data->id) }}">Edit</a> 
                                    </button>
                                    <button onclick="hapus( {{$data->id}}  )" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </th>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
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