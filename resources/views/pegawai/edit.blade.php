@extends('template.main')
@section('halaman', 'departemen')

@section('title', 'Edit departemen')

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
                        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">ID Pegawai</label>
                                <input type="text" class="form-control @error('id_pegawai') is-invalid @enderror"
                                    name="id_pegawai" value="{{ old('id_pegawai', $pegawai->id_user) }}"
                                    placeholder="Masukkan Nama pegawai" readonly>
                                <!-- error message untuk keterangan kelas -->
                                @error('id_pegawai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama', $pegawai->nama) }}"
                                    placeholder="Masukkan Nama pegawai">
                                <!-- error message untuk keterangan kelas -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    name="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}"
                                    placeholder="Masukkan jabatan pegawai">
                                <!-- error message untuk keterangan kelas -->
                                @error('jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Departemen</label>
                                <select name="departemen" id="departemen"
                                    class="form-control @error('jabatan') is-invalid @enderror">
                                    <option value="">Pilih Departemen Pegawai</option>
                                    @foreach ($departemen as $i)
                                        <option value="{{ $i->id }}" {{ $i->id == $pegawai->id ? 'selected' : '' }}>
                                            {{ $i->nama }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk keterangan kelas -->
                                @error('jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ old('alamat', $pegawai->alamat) }}"
                                    placeholder="Masukkan alamat pegawai">
                                <!-- error message untuk keterangan kelas -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Telepon</label>
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                    name="telepon" value="{{ old('telepon', $pegawai->telepon) }}"
                                    placeholder="Masukkan telepon pegawai">
                                <!-- error message untuk keterangan kelas -->
                                @error('telepon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Shift</label>
                                <select name="shift" id="shift"
                                    class="form-control @error('shift') is-invalid @enderror">
                                    <option value="">Pilih Shift Pegawai</option>
                                    @foreach ($shift as $i)
                                        <option value="{{ $i->id }}"
                                            {{ $i->id == $pegawai->id ? 'selected' : '' }}>
                                            {{ $i->nama . ' | ' . $i->jam_masuk . ' - ' . $i->jam_keluar }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk keterangan kelas -->
                                @error('jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr>
                            <div class="form-group">
                                @foreach ($user as $i)
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email', $i->email) }}"
                                        placeholder="Masukkan email pegawai">
                                    <!-- error message untuk keterangan kelas -->
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                @endforeach

                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Hak Akses</label>
                                <select name="akses" id="akses"
                                    class="form-control @error('shift') is-invalid @enderror">
                                    <option value="">Pilih Akses Pegawai</option>
                                    @foreach ($user as $i)
                                        <option value="admin" {{ 'admin' == $i->akses ? 'selected' : '' }}>Hak Akses
                                            Admin</option>
                                        <option value="pegawai" {{ 'pegawai' == $i->akses ? 'selected' : '' }}>Hak
                                            Akses
                                            Pegawai</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk keterangan kelas -->
                                @error('jabatan')
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
