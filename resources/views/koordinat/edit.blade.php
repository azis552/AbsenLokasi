@extends('template.main')
@section('halaman','koordinat')

@section('title', 'Edit koordinat')

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
                        <form action="{{ route('koordinat.update',$koordinat->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div id="map" style="height: 400px;"></div>
                            <div class="form-group">
                                <input type="hidden" class="form-control @error('id_koordinat') is-invalid @enderror"
                                    name="id_koordinat" value="{{ $koordinat->id }}" readonly>
                                <!-- error message untuk kode kelas -->
                                @error('id_koordinat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Lokasi</label>
                                <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror"
                                    name="nama_lokasi" value="{{ old('nama',$koordinat->nama_lokasi) }}"
                                    placeholder="Masukkan nama">
                                <!-- error message untuk keterangan kelas -->
                                @error('nama_lokasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="radius">Radius (meter)</label>
                                <input type="text" class="form-control @error('radius') is-invalid @enderror"
                                    name="radius" id="radius" value="{{ old('radius',$koordinat->radius) }}" placeholder="Masukkan radius">
                                <!-- error message untuk keterangan kelas -->
                                @error('radius')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Latitude</label>
                                <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                    name="latitude" id="latitude" value="{{ old('latitude',$koordinat->latitude) }}"
                                    placeholder="Masukkan latitude">
                                <!-- error message untuk keterangan kelas -->
                                @error('latitude')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Longitude</label>
                                <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                    name="longitude" id="longitude" value="{{ old('longitude',$koordinat->longitude) }}"
                                    placeholder="Masukkan longitude">
                                <!-- error message untuk keterangan kelas -->
                                @error('longitude')
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
        <script>
            var map;
            var marker;
            var circle;

            function initMap() {
                // Inisialisasi peta
                map = L.map('map').setView([-7.831147634627184, 111.92219966728675], 60);

                // Tambahkan layer dari OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.aziskoding.org/copyright">AzisKoding</a> contributors'
                }).addTo(map);

                // Inisialisasi marker
                marker = L.marker([-7.831147634627184, 111.92219966728675], {
                    draggable: true
                }).addTo(map);

                // Menangani perpindahan marker
                marker.on('dragend', function(event) {
                    document.getElementById('latitude').value = marker.getLatLng().lat;
                    document.getElementById('longitude').value = marker.getLatLng().lng;
                    updateRadiusCircle();
                });

                // Inisialisasi lingkaran (tanpa radius awal)
                circle = L.circle(marker.getLatLng(), {
                    radius: 0
                }).addTo(map);
            }

            function updateRadiusCircle() {
                console.log('Update radius circle');
                var radius = parseInt(document.getElementById('radius').value);
                var markerLatLng = marker.getLatLng();

                // Update both position and radius of the circle
                circle.setLatLng([markerLatLng.lat, markerLatLng.lng]).setRadius(radius);
            }

            // Panggil fungsi initMap saat halaman dimuat
            window.onload = initMap;
        </script>
@endsection