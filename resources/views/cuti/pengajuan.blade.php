@extends('template.main')
@section('halaman', 'Data Cuti')
@section('title', 'Cuti')

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
                        <form action="{{ route('cuti.simpan_pengajuan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Keperluan Cuti</label>
                                <input type="text" class="form-control @error('cuti') is-invalid @enderror"
                                    name="cuti" value="{{ old('cuti') }}" placeholder="Masukkan Nama cuti">
                                <!-- error message untuk keterangan kelas -->
                                @error('cuti')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Mulai Cuti</label>
                                <input type="date" class="form-control @error('mulai_cuti') is-invalid @enderror"
                                    name="mulai_cuti" value="{{ old('mulai_cuti') }}">
                                <!-- error message untuk keterangan kelas -->
                                @error('mulai_cuti')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Akhir Cuti</label>
                                <input type="date" class="form-control @error('akhir_cuti') is-invalid @enderror"
                                    name="akhir_cuti" value="{{ old('akhir_cuti') }}">
                                <!-- error message untuk keterangan kelas -->
                                @error('akhir_cuti')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Pengganti Selama Cuti</label>
                                <select class="form-control" name="id_pegawai_pengganti" id="id_pegawai_pengganti">
                                    <option value="">Pilih Pengganti</option>
                                    @foreach ($pegawai as $i)
                                        <option value="{{ $i->id_user }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk keterangan kelas -->
                                @error('id_pegawai_pengganti')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
