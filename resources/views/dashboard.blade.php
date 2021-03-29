@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Tapel') }}</div>

                <div class="card-body">
                    <div>
                        <form class="form" action="{{ route('tapel-store') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" name="tapel" class="form-control" placeholder="Insert tapel">
                                <br>
                                <button class="form-control btn btn-primary" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><br>

            @foreach ($tahunAjarans as $tahunAjaran)
            <div class="card">
                <div class="card-header" style="display: flex; ">
                    <div>
                        <p style="margin: auto; padding: 7px;">Tapel {{ $tahunAjaran->tapel }}</p>
                    </div>
                    <div style="padding-left: 52%; margin: auto;">
                        @if (($tahunAjaran->status) == 0)
                            <button class="btn btn-warning">
                                <a href="{{ route('tapel-edit', $tahunAjaran->id) }}">Edit</a> 
                            </button>
                            <button onclick="hapus( {{$tahunAjaran->id}}  )" class="btn btn-danger">
                                Delete
                            </button>
                            <button onclick="publish( {{$tahunAjaran->id}}  )" class="btn btn-primary">
                                Publish
                            </button>
                        @elseif($tahunAjaran->status < 0)
                            <div style="margin: auto;">
                                Expired
                            </div>
                        @elseif($tahunAjaran->status == 1)
                            <div style="margin: auto;">
                                Active
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="hidden" name="id" value="$tahunAjaran-id">
                    <a href="{{ route('tapel-desc', ['id' => $tahunAjaran->id]) }}">Lihat selengkapnya</a>
                </div>
            </div><br>
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