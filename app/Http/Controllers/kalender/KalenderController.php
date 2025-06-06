<?php

namespace App\Http\Controllers\Kalender;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KalenderController extends Controller
{
    public function kalenderIndex()
    {
        return view("content.kalender.kalender");
    }

    public function cekJadwal(Request $request) {
        $tanggalBooking = $request->tanggal_booking;
        $waktuBooking = $request->jam_booking;
    
        $jumlahPemesanPadaTanggal = Pemesanan::where("tanggal_booking", $tanggalBooking)->count();
    
        if ($jumlahPemesanPadaTanggal >= 3) {
            return response()->json([
                "status" => false,
                "message" => "Sudah 3 pemesan di tanggal tersebut"
            ], 400);
        }
    
        $waktuBookingCarbon = Carbon::parse($waktuBooking);
        $existingBookings = Pemesanan::where("tanggal_booking", $tanggalBooking)->get();
    
        foreach ($existingBookings as $booking) {
            $existingBookingTime = Carbon::parse($booking->jam_booking);
            $diffInHours = $waktuBookingCarbon->diffInHours($existingBookingTime);
    
            if ($diffInHours < 3) {
                return response()->json([
                    "status" => false,
                    "message" => "Booking harus berjarak minimal 3 jam dari pemesanan lain"
                ], 400);
            }
        }
    
        return response()->json([
            "status" => true,
            "message" => "Tanggal dan jam tersedia untuk booking"
        ], 200);
    }
}
