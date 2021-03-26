@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('kelas') }}
                    <a style="padding-left: 85%;" href="{{ route('home') }}">
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
                                <input class="form-control" type="text" name="kelas">
                                <br>
                                <button class="form-control btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </thead>

                            @foreach ($datas as $data)
                            <tbody>
                                <th>{{ $data->id }}</th>
                                <th>{{ $data->kelas }}</th>
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