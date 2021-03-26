@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Tapel') }}
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
                        <form class="form" action="{{ route('tapel-store') }}" method="POST">
                            @csrf
                            <div>
                                <input class="form-control" type="text" name="tapel">
                                <br>
                                <button class="form-control btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </thead>

                            @foreach ($datas as $data)
                            <tbody>
                                <th>{{ $data->id }}</th>
                                <th>{{ $data->tapel }}</th>
                                <th>
                                    @if (($data->status) == 0)
                                        <button class="btn btn-warning">
                                            <a href="{{ route('tapel-edit', $data->id) }}">Edit</a> 
                                        </button>
                                        <button onclick="hapus( {{$data->id}}  )" class="btn btn-danger">
                                            Delete
                                        </button>
                                        <button onclick="publish( {{$data->id}}  )" class="btn btn-primary">
                                            Publish
                                        </button>
                                    @elseif($data->status < 0)
                                        Expired
                                    @elseif($data->status == 1)
                                        Active
                                    @endif
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
            Swal.fire({
              title: 'Are you sure?',
              text: 'After you publish, you can\'t delete this!',
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
                          'Your file has been Publish.',
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