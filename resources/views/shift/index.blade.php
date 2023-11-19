@extends('template.main')
@section('halaman','Data Shift')
@section('title', 'Shift')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('halaman')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@yield('halaman')</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tablekelas" class="table table-bordered table-striped">
                            <a href="{{ route('shift.create') }}" type="button" class="btn btn-primary mb-2">Tambah</a>
                            <thead>
                                <tr>
                                    <th>Nama Shift</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shifts as $i)
                                    <tr>
                                        <td>{{ $i->nama }}</td>
                                        <td>{{ $i->jam_masuk }}</td>
                                        <td>{{ $i->jam_keluar }}</td>
                                        <td >
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"action="{{ route('shift.destroy', $i->id) }}" method="POST">
                                                <a href="{{ route('shift.edit', $i->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
