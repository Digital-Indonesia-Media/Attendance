@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tapel {{$data->tapel}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content">
						<form action="{{ route('tapel-update') }}" method="POST">
							@csrf
							@method('PUT')
							<input type="hidden" name="id" value="{{ $data->id }}">
                            <div>
                                <label>Tapel</label>
							     <input class="form-control" type="text" name="tapel" value="{{ $data->tapel }}">
                            </div><br>
                            <div>
                                <label>Start Tapel On</label>
                                <input type="date" name="started_at" class="form-control" value="{{ $data->started_at }}">
                            </div><br>
							<button class="btn btn-success">Update</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection