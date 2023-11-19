@extends('template.main')
@section('halaman','Shift')

@section('title', 'Edit Shift')

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
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('shift.update',$shift->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" class="form-control @error('id_shift') is-invalid @enderror"
                                    name="id_shift" value="{{ $shift->id_shift }}" readonly>
                                <!-- error message untuk kode kelas -->
                                @error('id_shift')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Shift</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama',$shift->nama) }}"
                                    placeholder="Masukkan nama">
                                <!-- error message untuk keterangan kelas -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jam Masuk</label>
                                <input type="text" class="form-control @error('jam_masuk') is-invalid @enderror"
                                    name="jam_masuk" value="{{ old('jam_masuk',$shift->jam_masuk) }}"
                                    placeholder="Masukkan Jam Masuk">
                                <!-- error message untuk keterangan kelas -->
                                @error('jam_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jam Keluar</label>
                                <input type="text" class="form-control @error('jam_keluar') is-invalid @enderror"
                                    name="jam_keluar" value="{{ old('jam_keluar',$shift->jam_keluar) }}"
                                    placeholder="Masukkan Jam Keluar">
                                <!-- error message untuk keterangan kelas -->
                                @error('jam_keluar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">EDIT</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection