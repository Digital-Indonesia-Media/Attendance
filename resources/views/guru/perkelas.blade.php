@extends('layouts.app')

@section('title')
{{ $kelass[0]->kelas }}
@endsection

@section('sidebar-nav')
<ul class="nav">
  <li>
    <a href=" {{ route('guru') }}">
      <i class="now-ui-icons design_app"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li class="active">
    <a href="{{ route('guru-kelas', $tahunAjarans[0]->id) }}">
      <i class="fas fa-warehouse"></i>
      <p>Data Kelas</p>
    </a>
  </li>

  <li>
    <a href="{{ route('guru-jadwal') }}">
      <i class="now-ui-icons education_agenda-bookmark"></i>
      <p>Jadwal</p>
    </a>
  </li>

  <li>
    <a href="{{ route('guru-profile') }}">
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $kelass[0]->kelas }}
                </div>

                <div class="card-body">
                    <div>
                        <table class="table" style="margin-top: 25px;">
                            <thead>
                                <td>Name</td>
                                <td>Role</td>
                                <td>Gmail</td>
                            </tdead>

                            @foreach ($datas as $data)
                            <tbody>
                                <td style="width: 35%;">{{ $data->name }}</td>
                                <td style="width: 20%;">{{ $data->role }}</td>
                                <td style="width: 20%;">{{ $data->email }}</td>
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