@extends('template.main')
@section('halaman', 'Data Pengajuan Cuti')
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
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tablekelas" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Keperluan</th>
                                    <th>Pengganti Kerja</th>
                                    <th>Status</th>
                                    <th>Mulai Cuti </th>
                                    <th>Akhir Cuti</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuti as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->pegawaiCuti->nama }}</td>
                                        <td>{{ $i->tanggal_pengajuan }}</td>
                                        <td>{{ $i->keperluan }}</td>
                                        <td>{{ $i->pegawaiPengganti->nama }}</td>
                                        <td>{{ $i->status }}</td>
                                        <td>{{ $i->mulai_cuti }}</td>
                                        <td>{{ $i->akhir_cuti }}</td>
                                        <td>{{ $i->catatan_hrd }}</td>
                                        <td>
                                                <a href="{{ route('cuti.update_hrda', $i->id) }}" class="btn btn-sm btn-warning">Approve</a>
                                                <a href="{{ route('cuti.update_hrdr', $i->id) }}" class="btn btn-sm btn-danger">Reject</a>
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
