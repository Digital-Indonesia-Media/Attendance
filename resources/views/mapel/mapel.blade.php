@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        {{ __('Mapel') }}
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

                    <form class="form" action="{{ route('mapel-store') }}" method="POST">
                        @csrf
                        <div>
                            <label>Mapel</label>
                            <input class="form-control" type="text" name="mapel" placeholder="Masukkan mapel" required="">
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
                            <!-- <input class="form-control" type="text" name="mapel" placeholder="Masukkan mapel" required=""> -->
                            <br>
                        </div>
                        <button class="btn form-control btn-success" type="submit">Submit</button>
                    </form>

                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <th>Mata Pelajaran</th>
                                <th>Status</th>
                                <th>Tapel</th>
                                <th>Aksi</th>
                            </thead>
                            @foreach ($datas as $data)
                            <tbody>
                                <th>{{ $data->mapel }}</th>

                                @if (($data->status) == 1)
                                <th>
                                    <p>Active</p>
                                </th>
                                @elseif (($data->status) == 0)
                                <th>
                                    Non-Active
                                </th>
                                @endif

                                <th>{{ $data->tapel }}</th>
                                <th>
                                    <a href="{{ route('mapel-edit', $data->id) }}"><button class="btn btn-warning">Edit</button></a>
                                    <button class="btn btn-danger" onclick="hapus({{ $data->id }})">Delete</button>
                                    @if (($data->status) == 1)
                                    <a href="{{ route('mapel-nonActive') }}" method="POST">
                                      @csrf
                                      <button class="btn btn-primary">Non-Active</button>
                                    </a>
                                    @elseif (($data->status) == 0)
                                    <a href="{{ route('mapel-active') }}" method="POST">
                                      @csrf
                                      <button class="btn btn-primary">Active</button>
                                    </a>
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
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
        function hapus(id) {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('mapel-delete') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function (data) {
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                        location.reload()
                    },
                    error: function (error) {
                        console.log(error);
                        console.log(error.responseText);
                        Swal.fire(
                          'Error!',
                          'Terjadi kesalahan',
                          'error'
                        )
                    }       
                });              
               }
            })
        }
    </script>
@endsection