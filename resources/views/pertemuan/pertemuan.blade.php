@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Pertemuan') }}
                    <a style="padding-left: 85%;" href="{{ route('admin') }}">
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
                        <form class="form" action="{{ route('pertemuan-store') }}" method="POST">
                            @csrf
                            <div>
                                <label>Mapel</label>
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
                                <button class="form-control btn btn-primary" type="submit">Submit</button>
                        </form><br>

                        <table class="table">
                            <thead>
                                <th class="center">Pertemuan Ke-</th>
                                <th class="center">Mapel</th>
                                <th class="center">Pembahasan</th>
                                <th class="center">Aksi</th>
                            </thead>
                            @foreach($pertemuans as $pertemuan)
                            <tbody>
                                <th class="center">{{ $pertemuan->pertemuan_ke }}</th>
                                <th class="center">{{ $pertemuan->mapel }}</th>
                                <th class="center">{{ $pertemuan->pembahasan }}</th>
                                <th class="center">
                                    <button class="btn btn-sm btn-warning">
                                        <a href="{{ route('pertemuan-edit', $pertemuan->id) }}">Edit</a> 
                                    </button>
                                    <button onclick="hapus( {{$pertemuan->id}}  )" class="btn btn-sm btn-danger">
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