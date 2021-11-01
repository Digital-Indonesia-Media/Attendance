@extends('layouts.app')

@section('title')
Pertemuan
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li>
    <a href=" {{ route('siswa') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li class="active">
    <a href="{{ route('siswa-jadwal') }}">
      <i class="now-ui-icons education_agenda-bookmark"></i>
      <p>Jadwal</p>
    </a>
  </li>

  <li>
    <a href="{{ route('siswa-profile') }}">
      <i class="now-ui-icons users_single-02"></i>
      <p>Profil Pengguna</p>
    </a>
  </li>
</ul>
@endsection

@section('username')
{{ Auth::user()->name }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Matematika Wajib</div>

            <div class="card-body">
                <div>
                    <table class="table">
                        <thead>
                            <th class="center">Pertemuan Ke-</th>
                            <th class="center">Pembahasan</th>
                            <th class="center"></th>
                        </thead>
                        @foreach($pertemuans as $pertemuan)
                        <tbody>
                            <td class="center">{{ $pertemuan->pertemuan_ke }}</td>
                            <td class="center">{{ $pertemuan->pembahasan }}</td>
                            <td class="center inline">
                                @if ($pertemuan->status == 0)
                                    <p style="color:#f96332; padding-top: 17px;">Belum dipublish oleh Guru Mapel</p>
                                @elseif($pertemuan->kehadiran() == 1)
                                    <div style="margin: auto;">
                                        <p style="color:#18ce0f; padding-top: 17px;">Hadir</p>
                                    </div>
                                @elseif($pertemuan->kehadiran() == 2)
                                    <div style="margin: auto;">
                                        <p style="color:#ffb236; padding-top: 17px;">Izin</p>
                                    </div>
                                @elseif($pertemuan->kehadiran() == 3)
                                    <div style="margin: auto;">
                                        <p  style="color: #ffb236; margin-top: 17px;"><i class="fas fa-recycle"></i> Proses Izin</p>
                                    </div>
                                @elseif($now > $pertemuan->data_expired)
                                    <div style="margin: auto;">
                                        <p style="color:#ff3636; padding-top: 17px;">Alfa</p>
                                    </div>
                                @elseif ($pertemuan->status == 1)
                                    <div style="margin: auto;">
                                        <button class="btn btn-success" style="margin-top: 5px; width: 100px;" data-toggle="modal" data-target="#modalHadir_{{ $pertemuan->id}}">Hadir</button>
                                        <button class="btn btn-warning" style="margin-top: 5px; width: 100px;" data-toggle="modal" data-target="#modalIzin_{{ $pertemuan->id}}">Izin</button>
                                    </div>
                                    <!-- Modal untuk hadir -->
                                    <div class="modal fade" id="modalHadir_{{ $pertemuan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Kehadiran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('siswa-pertemuan-hadir', $pertemuan->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label style="text-align: left!important;">Masukkan Kode</label>
                                                            <input class="form-control" type="text" name="kode" required="">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Hadir</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal untuk izin -->
                                    <div class="modal fade" id="modalIzin_{{ $pertemuan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Izin</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('siswa-pertemuan-izin', $pertemuan->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label style="text-align: left!important;">Tuliskan Keterangan Izin</label>
                                                            <input class="form-control" type="text" name="keterangan" required="">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Izin</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endif
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div><br>
    </div>
</div>



<!-- Akhir modal -->
@endsection

@section('js')
    
@endsection