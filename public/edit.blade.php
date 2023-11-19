@extends('template.main')
@section('halaman','Data Kelas')

@section('title', 'Edit Kelas')

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
                        <form action="{{ route('kelas.update',$kelas->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Kode Kelas</label>
                                <input type="text" class="form-control @error('id_kelas') is-invalid @enderror"
                                    name="id_kelas" value="{{ $kelas->id_kelas }}" readonly>
                                <!-- error message untuk kode kelas -->
                                @error('id_kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                            <div class="form-group">
                                <label class="font-weight-bold">Kompetensi Keahlian</label>
                                <input type="text" class="form-control @error('kompetensi_keahlian') is-invalid @enderror"
                                    name="kompetensi_keahlian" value="{{ old('kompetensi_keahlian',$kelas->kompetensi_keahlian) }}"
                                    placeholder="Masukkan kompetensi keahlian">
                                <!-- error message untuk keterangan kelas -->
                                @error('kompetensi_keahlian')
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