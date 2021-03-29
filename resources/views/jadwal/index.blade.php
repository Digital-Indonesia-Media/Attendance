@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Jadwal') }}
                    <a style="padding-left: 84%;" href="{{ route('home') }}">
                        <button class="end-0 btn btn-primary">Back</button>
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <form class="form" action="{{ route('jadwal-store') }}" method="POST">
                            @csrf
                            <div>
                                <label>Tahun Pelajaran</label>
                                <select name="tapel_id" class="form-control">
                                    <option value="" disabled selected hidden>Pilih Tahun Pelajaran</option>
                                    @foreach ($tahunAjarans as $tahunAjaran)
                                    <option value="{{ $tahunAjaran->id }}">{{ $tahunAjaran->tapel }}</option>
                                    @endforeach
                                </select>
                                <!-- <input class="form-control" type="text" name="tapel"> -->
                            </div><br>
                            <div>
                                <label>Kelas</label>
                                <select name="kelas_id" class="form-control">
                                    <option value="" disabled selected hidden >Pilih Kelas</option>
                                    @foreach ($kelass as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div>
                                <label>Mata Pelajaran</label>
                                <select name="mapel_id" class="form-control">
                                    <option value="" disabled selected hidden>Pilih Mata Pelajaran</option>
                                    @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div>
                                <label>Hari</label>
                                <select name="hari" class="form-control">
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
                                <input class="form-control" type="time" name="waktu">
                            </div><br>
                            <div>
                                <label>Minggu</label>
                                <select name="minggu" class="form-control">
                                    <option value="" disabled selected hidden>Pilih Minggu keberapa</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div><br>
                            <button class="form-control btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>

                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <th>No</th>
                                <th>Tahun Pelajaran</th>
                                <th>Kelas</th>
                                <th>Mata Pelajaran</th>
                                <th>Hari</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </thead>

                            @foreach ($datas as $data)
                            <tbody>
                                <th>{{ $data->id }}</th>
                                <th>{{ $data->tapel->tapel }}</th>
                                <th>{{ $data->kelas->kelas }}</th>
                                <th>{{ $data->mapel->mapel }}</th>
                                <th>{{ $data->hari }}</th>
                                <th>{{ $data->waktu }}</th>
                                <th>
                                    <button class="btn btn-warning">
                                        <a href="{{ route('jadwal-edit', $data->id) }}">Edit</a> 
                                    </button>
                                    <button onclick="hapus( {{$data->id}}  )" class="btn btn-danger">
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