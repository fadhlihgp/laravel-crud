@extends('layout.template')
    <!-- START DATA -->
@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <a href="{{url('logout')}}" class="btn btn-link mb-2">Logout</a>
        <div class="pb-3">
            <form class="d-flex" action="{{url('student')}}" method="get">
                <input class="form-control me-1" type="search" name="keyvalue" value="{{ Request::get('keyvalue') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='student/create' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">NIM</th>
                <th class="col-md-4">Nama</th>
                <th class="col-md-2">Jurusan</th>
                <th class="col-md-2">Aksi</th>
            </tr>
            </thead>
            <?php
                $no = 1;
            ?>
            <tbody>
                @foreach($student as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nim}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->major}}</td>
                        <td>
                            <a href='{{ url('student/'.$data->nim.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Are you sure want delete data ?')" action="{{url('student/'.$data->nim)}}" class="d-inline" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <!-- AKHIR DATA -->
@endsection

