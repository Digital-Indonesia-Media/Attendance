@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content">
						<form action="{{ route('user-update') }}" method="POST">
							@csrf
							@method('PUT')
							<input type="hidden" name="id" value="{{ $data->id }}">
                            <div>
                                <div>
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                                </div>
                                <br>

                                <div>
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" value="{{ $data->email }}">
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

                                <button class="form-control btn btn-success">Update</button>
                            </div>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection