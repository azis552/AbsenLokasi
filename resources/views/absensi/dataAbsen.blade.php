@extends('template.main')
@section('halaman', 'Data Absensi')
@section('title', 'Absensi')

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
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Jam </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensis as $i)
                                    <tr>
                                        <td>
                                            {{ $i->pegawai->nama }}
                                        </td>
                                        <td>{{ $i->status }}</td>
                                        <td>{{ $i->tanggal }}</td>
                                        <td>
                                            @if ($i->jam != null)
                                                {{ $i->jam }}
                                            @else
                                                {{ $i->jam }}
                                            @endif

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
