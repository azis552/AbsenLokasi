<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Koordinat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();
        $user = Auth::user();
        return view('absensi.index', compact('now', 'user'));
    }

    public function data_absensi()
    {
        $absensis = Absensi::get();

        return view('absensi.dataAbsen',compact('absensis'));
    }

    public function masuk(Request $request)
    {
        $user = Auth::user();
        $koordinat = Koordinat::get();
        foreach($koordinat as $i):
            $latitude = $i->latitude;
            $longitude = $i->longitude;
            $radius= $i->radius;
        endforeach;
        // Ganti dengan koordinat tempat absensi yang diizinkan
        $allowedLatitude = $latitude;
        $allowedLongitude = $longitude;

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Ganti dengan radius yang diizinkan (dalam meter)
        $allowedRadius = $radius;

        // Hitung jarak antara koordinat pengguna dan koordinat yang diizinkan
        $distance = $this->haversineGreatCircleDistance($allowedLatitude, $allowedLongitude, $latitude, $longitude);

        // Jika jarak kurang dari radius yang diizinkan, lakukan absensi
        if ($distance <= $allowedRadius) {
            Absensi::create([
                'id_user' => $user->id_user,
                'tanggal' => now()->toDateString(),
                'jam' => now()->toTimeString(),
                'status' => 'masuk',
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);

            return redirect()->back()->with('success', 'Absensi masuk berhasil.');
        }else{
            return redirect()->back()->with('error', 'Tidak Berhasil Absen Diluar Lokasi Kantor');
        }
    }

    public function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        return $angle * $earthRadius;
    }

    public function pulang(Request $request)
    {
        $user = Auth::user();
        $koordinat = Koordinat::get();
        foreach($koordinat as $i):
            $latitude = $i->latitude;
            $longitude = $i->longitude;
            $radius= $i->radius;
        endforeach;
        // Ganti dengan koordinat tempat absensi yang diizinkan
        $allowedLatitude = $latitude;
        $allowedLongitude = $longitude;

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Ganti dengan radius yang diizinkan (dalam meter)
        $allowedRadius = $radius;

        // Hitung jarak antara koordinat pengguna dan koordinat yang diizinkan
        $distance = $this->haversineGreatCircleDistance($allowedLatitude, $allowedLongitude, $latitude, $longitude);

        // Jika jarak kurang dari radius yang diizinkan, lakukan absensi
        if ($distance <= $allowedRadius) {
            Absensi::create([
                'id_user' => $user->id_user,
                'tanggal' => now()->toDateString(),
                'jam' => now()->toTimeString(),
                'status' => 'pulang',
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);

            return redirect()->back()->with('success', 'Absensi Pulang berhasil.');
        }else{
            return redirect()->back()->with('error', 'Tidak Berhasil Absen Diluar Lokasi Kantor');
        }
    }
    public function keluar()
    {
        // Logika untuk proses absensi pulang
        // ...

        return redirect()->back()->with('success', 'Absensi keluar berhasil.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
