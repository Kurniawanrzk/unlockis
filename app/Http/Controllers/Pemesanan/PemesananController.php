<?php

namespace App\Http\Controllers\Pemesanan;

use App\Http\Controllers\Controller;
use App\Models\{Notif,Background, ServisTambahan, FileSent, Invoice, Paket, Pelanggan, Pemesanan, PemesananBackground, PemesananFileSent, ServisTambahanPemesanan};
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;


class PemesananController extends Controller
{

    public function pemesananIndex() {
        $data = Pemesanan::with(['pelanggan', 'paket'])->get();
        return view("content.pemesanan.pemesanan")->with("data", $data);
    }

    public function pemesananEditIndex($id) {
        $data = [
            'pemesanan' => Pemesanan::findOrFail($id),
            'paket' => Paket::all()
        ];

        return view("content.form.pemesanan_edit")->with("data", $data);
    }
    public function pemesananEdit($id, Request $request) {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update([    
            "total_orang_foto" => $request->total_orang_foto,
            "tanggal_booking" => $request->tanggal_booking,
            "jam_booking" => $request->jam_booking,
            "id_paket" => $request->id_paket,
            'id_photographer' => $request->id_photographer,
            'status_pembayaran' => $request->status_pembayaran,
            "status_pengerjaan" => $request->status_pengerjaan
        ]);
        return redirect()->route('pemesanan-index');
    }

    public function pemesananBgEditIndex($id) {
        $data = [
            'selected_backgrounds' => PemesananBackground::where("id_pemesanan", $id)->pluck('id_background')->toArray(),
            'backgrounds' => Background::all(),
            'pemesanan_id' => $id
        ];

        return view("content.form.pemesanan_background_edit")->with("data", $data);
    }

    public function pemesananBgEdit($id, Request $request) {
        PemesananBackground::where('id_pemesanan', $id)->whereNotIn('id_background', $request->id_background ?? [])->delete();

        if (!empty($request->id_background)) {
            foreach ($request->id_background as $backgroundId) {
                PemesananBackground::updateOrCreate(
                    ['id_pemesanan' => $id, 'id_background' => $backgroundId]
                );
            }
        }

        return redirect()->route('pemesanan-index');
    }

    public function pemesananServisEditIndex($id) {
        $data = [
            'selected_servis' => ServisTambahanPemesanan::where("id_pemesanan", $id)->pluck('id_servis')->toArray(),
            'servis_tambahan' => ServisTambahan::all(),
            'pemesanan_id' => $id
        ];

        return view("content.form.pemesanan_servis_edit")->with("data", $data);
    }

    public function pemesananServisEdit($id, Request $request) {
        $pemesanan = Pemesanan::findOrFail($id);
        $selectedServis = $request->id_servis ?? [];

        $this->updateServisTambahan($pemesanan, $selectedServis);
        
        return redirect()->route('pemesanan-index');
    }

    private function updateServisTambahan($pemesanan, $selectedServis) {
        $currentServis = ServisTambahanPemesanan::where('id_pemesanan', $pemesanan->id_pemesanan)->pluck('id_servis')->toArray();

        $toDelete = array_diff($currentServis, $selectedServis);
        $toAdd = array_diff($selectedServis, $currentServis);

        ServisTambahanPemesanan::where('id_pemesanan', $pemesanan->id_pemesanan)->whereIn('id_servis', $toDelete)->delete();

        foreach ($toAdd as $servisId) {
            ServisTambahanPemesanan::create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_servis' => $servisId
            ]);
        }

        $totalHarga = $pemesanan->total_harga + array_sum(array_map(function($id) {
            return ServisTambahan::find($id)->harga_servis ?? 0;
        }, $toAdd)) - array_sum(array_map(function($id) {
            return ServisTambahan::find($id)->harga_servis ?? 0;
        }, $toDelete));

        $pemesanan->update(['total_harga' => $totalHarga]);
    }

    public function pemesananFsEditIndex($id) {
        $data = [
            'selected_files' => PemesananFileSent::where("id_pemesanan", $id)->pluck('id_file_sent')->toArray(),
            'files' => FileSent::all(),
            'pemesanan_id' => $id
        ];

        return view("content.form.pemesanan_file_sent_edit")->with("data", $data);
    }

    public function pemesananFsEdit($id, Request $request) {
        $pemesanan = Pemesanan::findOrFail($id);
        $selectedFiles = $request->id_file_sent ?? [];

        $this->updateFileSent($pemesanan, $selectedFiles);
        
        return redirect()->route('pemesanan-index');
    }

    private function updateFileSent($pemesanan, $selectedFiles) {
        $currentFiles = PemesananFileSent::where('id_pemesanan', $pemesanan->id_pemesanan)->pluck('id_file_sent')->toArray();

        $toDelete = array_diff($currentFiles, $selectedFiles);
        $toAdd = array_diff($selectedFiles, $currentFiles);

        PemesananFileSent::where('id_pemesanan', $pemesanan->id_pemesanan)->whereIn('id_file_sent', $toDelete)->delete();

        foreach ($toAdd as $fileId) {
            PemesananFileSent::create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_file_sent' => $fileId
            ]);
        }

        $totalHarga = $pemesanan->total_harga + array_sum(array_map(function($id) {
            return FileSent::find($id)->harga_file_sent ?? 0;
        }, $toAdd)) - array_sum(array_map(function($id) {
            return FileSent::find($id)->harga_file_sent ?? 0;
        }, $toDelete));

        $pemesanan->update(['total_harga' => $totalHarga]);
    }

    public function formPemesananPost(Request $request, PDF $pdf) {
        

        $pelanggan = Pelanggan::create($request->only([
            'member_id', 'foto_kartu_member', 'nama_lengkap', 'no_wa', 'instagram', 'no_rekening', 'nama_bank'
        ]));
    
        // Perhitungan total harga
        $totalHarga = 0;
        $totalHarga += $request->paket_foto ? Paket::find($request->paket_foto)->harga ?? 0 : 0;
        
        // Pastikan menggunakan null coalescing operator untuk menghindari error jika array kosong
        $fileSentIds = $request->file_sent ?? [];
        $servisTambahanIds = $request->servis_tambahan ?? [];
    
        // Perhitungan harga file sent
        if (!empty($fileSentIds)) {
            $totalHarga += array_sum(array_map(fn($id) => FileSent::find($id)->harga_file_sent ?? 0, $fileSentIds));
        }


    
        // Perhitungan harga servis tambahan
        if (!empty($servisTambahanIds)) {
           if(!empty($request->lembar_foto)) {
                for($i = 0; $i < count($request->lembar_foto); $i++) {
                    $totalHarga += (int)ServisTambahan::find($request->id_servis_lembar[$i])->harga_servis * $request->lembar_foto[$i]; 
                }
                $servisTambahanIds = array_diff($servisTambahanIds, $request->id_servis_lembar);
           }
            $totalHarga += array_sum(array_map(fn($id) => ServisTambahan::find($id)->harga_servis ?? 0, $servisTambahanIds));
        }

    
        // Hapus return statement yang menghentikan proses
        $request->merge([ "id_paket" => $request->paket_foto ]);
        unset($request->paket_foto);
    
        $pemesanan = Pemesanan::create(array_merge($request->only([
            'catatan', 'referensi', 'total_orang_foto', 'tanggal_booking', 'jam_booking', 'id_paket'
        ]), ['id_pelanggan' => $pelanggan->id_pelanggan, 'total_harga' => $totalHarga]));
    
        $this->associateItems($pemesanan->id_pemesanan, 'servis_tambahan', ServisTambahanPemesanan::class, 'id_servis', $request->servis_tambahan ?? []);
        $this->associateItems($pemesanan->id_pemesanan, 'file_sent', PemesananFileSent::class, 'id_file_sent', $request->file_sent ?? []);
        $this->associateItems($pemesanan->id_pemesanan, 'background', PemesananBackground::class, 'id_background', $request->background ?? []);
    
        $dataInvoice = ['title' => "Invoice", "pemesanan" => Pemesanan::with("pelanggan", "paket")
        ->find($pemesanan->id_pemesanan)];
    
        $pdf = $pdf->loadView("content.document.invoice", $dataInvoice);
        $this->sendPdf($request->no_wa, 'data:application/pdf;base64,' . base64_encode($pdf->output()));
        $this->sendEmailNotification($pemesanan);
       
        return response()->json([
            "status" => true,
            "data" => $pemesanan,
        ], 200);
    }

    private function associateItems($pemesananId, $key, $model, $foreignKey, $ids) {
        foreach ($ids as $id) {
            $model::create([
                'id_pemesanan' => $pemesananId,
                $foreignKey => $id
            ]);
        }
    }

    private function sendEmailNotification($pemesanan) {
        $emails = Notif::pluck('email');

        // Kirim email ke setiap alamat email menggunakan PHPMailer
        foreach ($emails as $email) {
            $mail = new PHPMailer(true);
            
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through
                $mail->SMTPAuth = true;
                $mail->Username = 'kurniawanrz205@gmail.com'; // SMTP username
                $mail->Password = 'fbcq gjxv lyio wfjw'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;  
    
                // Recipients
                $mail->setFrom('kurniawanrz205@gmail.com', 'Unlock Studio Reminder');
                $mail->addAddress($email); // Add recipient email
    
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Pemesanan Baru Telah Diterima';
                $mail->Body    = view('emails.notification', ['pemesanan' => $pemesanan])->render(); // You can pass any data to the view
    
                // Send the email
                $mail->send();
           
        }
    }

    private function sendPdf($number, $base64pdf)
    {
        $data = [
            'number' => $number,
            'base64Pdf' => $base64pdf,
        ];
    
        $apiUrl = 'https://23a3-103-208-94-152.ngrok-free.app/send-pdf'; 
    
        $ch = curl_init($apiUrl);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer '.env("UNLOCKIS_WWEB_JS"), 
        ]);
    
        // Execute cURL request and capture response
        $response = curl_exec($ch);
        
        // Check for cURL errors
        if (curl_errno($ch)) {
            // Log the error message
            
            return 'cURL error: ' . curl_error($ch);
        }
    
        // Close the cURL session
        curl_close($ch);
    
        // Log the response for debugging purposes
    
        // Optionally, return the response if needed
        return $response;
    }

    public function hapusPemesanan($id_pemesanan) {
        $pemesanan = Pemesanan::find($id_pemesanan);
        $pemesanan->delete();
        return redirect()->route('pemesanan-index');
    }
    
}