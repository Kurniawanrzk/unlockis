<?php

namespace App\Http\Controllers\Pemesanan;

use App\Http\Controllers\Controller;
use App\Models\ServisTambahan;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function servisTambahanIndex() {
        $datas = [
           ServisTambahan::all()
        ];

        return view("content.pemesanan.servis_tambahan")->with('datas', $datas);
    }

    public function servisTambahanPost(Request $request) {
        $create_layanan = ServisTambahan::create($request->all())->save();

        if($create_layanan) {
            return redirect()->back();
        }
    }

    public function servisTambahanEdit($id_layanan_foto,Request $request) {
        $update_layanan = ServisTambahan::find($id_layanan_foto)->update($request->all());

        if($update_layanan) {
            return redirect()->back();
        }
    }

    public function servisTambahanDelete($id_layanan_foto) {
        $delete_layanan_foto = ServisTambahan::destroy($id_layanan_foto);
        if($delete_layanan_foto) {
            return redirect()->back();
        }
    }
}
