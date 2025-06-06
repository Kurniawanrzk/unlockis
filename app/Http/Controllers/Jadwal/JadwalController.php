<?php

namespace App\Http\Controllers\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index()
    {
        return view('content.jadwal.jadwal');

    }

    public function getJadwalBooking()
    {
        $pemesanan = Pemesanan::where("status_pembayaran", "DP")
        ->Where('tanggal_booking', ">=", Carbon::today())
        ->orWhere("status_pembayaran", "Pelunasan")
        ->get()
        ->map(function($pemesanan){
            return [
                "id" => $pemesanan->id_pemesanan,
                "title" => "WIB",
                "description" => "Booked",
                "start" => $pemesanan->tanggal_booking.'T'. Carbon::createFromFormat('H:i:s', $pemesanan->jam_booking)->format('H:i')
            ];
        });

        return response()->json($pemesanan, 200);
    }
}
