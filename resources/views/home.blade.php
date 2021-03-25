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
                    <a href="{{ route('tapel-index') }}">Lihat selengkapnya</a>
                </div>
            </div><br>

            <div class="card">
                <div class="card-header">{{ __('Mapel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('mapel-index') }}">Lihat selengkapnya</a>
                </div>
            </div><br>

            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('user-index') }}">Lihat selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection