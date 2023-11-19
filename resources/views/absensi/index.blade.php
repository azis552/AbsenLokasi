@extends('template.main')
@section('halaman', 'Halaman Absensi')
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
                    <div class="card-header">
                        <div class="ml-2">
                            @auth
                                <h1>Selamat datang, {{ Auth::user()->name }}</h1>
                                <p>Email: {{ Auth::user()->email }}</p>
                            @endauth
                            <h1>Lokasi Saat Ini</h1>
                            <p id="userLocation"></p>
                            <p>Waktu Sekarang: {{ $now->toTimeString() }}</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1 mb-3 ml-2">
                                <form action="{{ route('absensi.masuk') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="latitude" name="latitude" required>
                                    <input type="hidden" id="longitude" name="longitude" required>
                                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                </form>
                            </div>
                            <div class="col-md-1 mb-3">
                                <form action="{{ route('absensi.pulang') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="latitude1" name="latitude" required>
                                    <input type="hidden" id="longitude1" name="longitude" required>
                                    <button type="submit" class="btn btn-success btn-block">Pulang</button>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        function showLocation(position) {
            var userLocation = 'Latitude: ' + position.coords.latitude + '<br>Longitude: ' + position.coords.longitude;
            var latitudeValue = position.coords.latitude;
            var longitudeValue = position.coords.longitude;
            document.getElementById('userLocation').innerHTML = userLocation;
            document.getElementById('latitude').value = latitudeValue;
            document.getElementById('longitude').value = longitudeValue;
            document.getElementById('latitude1').value = latitudeValue;
            document.getElementById('longitude1').value = longitudeValue;
            document.getElementById('latitude2').value = latitudeValue;
            document.getElementById('longitude2').value = longitudeValue;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    document.getElementById('userLocation').innerHTML = 'User denied the request for Geolocation.';
                    break;
                case error.POSITION_UNAVAILABLE:
                    document.getElementById('userLocation').innerHTML = 'Location information is unavailable.';
                    break;
                case error.TIMEOUT:
                    document.getElementById('userLocation').innerHTML = 'The request to get user location timed out.';
                    break;
                case error.UNKNOWN_ERROR:
                    document.getElementById('userLocation').innerHTML = 'An unknown error occurred.';
                    break;
            }
        }

        // Dapatkan lokasi pengguna saat halaman dimuat
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showLocation, showError);
        } else {
            document.getElementById('userLocation').innerHTML = 'Geolocation is not supported by this browser.';
        }
    </script>
@endsection
