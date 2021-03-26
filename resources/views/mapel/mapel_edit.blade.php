@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tapel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content">
						<form action="{{ route('mapel-update') }}" method="POST">
							@csrf
							@method('PUT')
							<input type="hidden" name="id" value="{{ $data->id }}">
							<input type="text" name="mapel" value="{{ $data->mapel }}">
							<button class="btn btn-success">Update</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection