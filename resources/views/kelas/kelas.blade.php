@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Kelas') }}
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

                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Tapel</th>
                                <th>Aksi</th>
                            </thead>

                            @foreach ($datas as $data)
                            <tbody>
                                <th>{{ $data->id }}</th>
                                <th>{{ $data->kelas }}</th>
                                <th>{{ $data->tapel }}</th>
                                <th>
                                    <button class="btn btn-warning">
                                        <a href="{{ route('kelas-edit', $data->id) }}">Edit</a> 
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