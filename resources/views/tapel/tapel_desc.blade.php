@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tapel {{ $data->tapel }}</div>

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
                                <thead>
                                    <th>Mapel</th>
                                </thead>
                                @foreach ($mapels as $mapel)
                                <tbody>
                                    <th>{{ $mapel->mapel }}</th>
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
                                <thead>
                                    <th>Kelas</th>
                                    <th></th>
                                </thead>
                                @foreach ($kelass as $kelas)
                                <tbody>
                                    <th>{{ $kelas->kelas }}</th>
                                    <th>
                                        <a href="{{ route('tapel-nameStudent', ['id' => $kelas->id, 'kelas' => $kelas->kelas]) }}">Lihat Selengkapnya...</a>
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