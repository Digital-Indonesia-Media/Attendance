@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('kelas') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content">
						<form action="{{ route('jadwal-update') }}" method="POST">
							@csrf
							@method('PUT')
							<input type="hidden" name="id" value="{{ $data->id }}">
							<div>
                                <label>Tahun Pelajaran</label>
                                <select name="tapel_id" class="form-control">
                                    <option value="{{ $data->tapel->id }}" selected hidden>{{ $data->tapel->tapel }}</option>
                                    @foreach ($tahunAjarans as $tahunAjaran)
                                    <option value="{{ $tahunAjaran->id }}">{{ $tahunAjaran->tapel }}</option>
                                    @endforeach
                                </select>
                                <!-- <input class="form-control" type="text" name="tapel"> -->
                            </div><br>
                            <div>
                                <label>Kelas</label>
                                <select name="kelas_id" class="form-control">
                                    <option value="{{ $data->kelas->id }}" selected hidden>{{ $data->kelas->kelas }}</option>
                                    @foreach ($kelass as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div>
                                <label>Mata Pelajaran</label>
                                <select name="mapel_id" class="form-control">
                                    <option value="{{ $data->mapel->id }}" selected hidden>{{ $data->mapel->mapel }}</option>
                                    @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div>
                                <label>Hari</label>
                                <select name="hari" class="form-control">
                                    <option value="{{ $data->hari }}" selected hidden>{{ $data->hari }}</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </div><br>
                            <div>
                                <label>Waktu</label>
                                <input class="form-control" type="text" class="form-control" type="time" name="waktu" value="{{ $data->waktu }}">
                            </div><br>
                            <div>
                                <label>Minggu</label>
                                <select name="minggu" class="form-control">
                                    <option value="" selected hidden>{{ $data->minggu }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
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