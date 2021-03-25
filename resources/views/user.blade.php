@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('User') }}
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
                        <form class="form" action="{{ route('user-store') }}" method="POST">
                            @csrf
                            <div>
                                <div>
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                                <br>

                                <div>
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email">
                                </div>
                                <br>

                                <div>
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>

                                <div>
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <br>

                                <div>
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="student">Student</option>
                                        <option value="teacher">Teacher</option>
                                    </select>
                                    <!-- <input class="form-control" type="text" name="role"> -->
                                </div>
                                <br>

                                <button class="form-control btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </thead>

                            @foreach ($datas as $data)
                            <tbody>
                                <th>{{ $data->id }}</th>
                                <th>{{ $data->name }}</th>
                                <th>{{ $data->role }}</th>
                                <th>
                                    @if (($data->status) == 0)
                                        <button class="btn btn-warning">
                                            <a href="{{ route('user-edit', $data->id) }}">Edit</a> 
                                        </button>
                                        <button onclick="hapus( {{$data->id}}  )" class="btn btn-danger">
                                            Delete
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