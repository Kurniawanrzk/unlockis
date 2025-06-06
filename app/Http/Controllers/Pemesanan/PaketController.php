<?php

namespace App\Http\Controllers\Pemesanan;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function PaketIndex() {
        $datas = [
           Paket::all()
        ];

        return view("content.pemesanan.paket")->with('datas', $datas);
    }

    public function PaketPost(Request $request) {
        $create_layanan = Paket::create($request->all())->save();

        if($create_layanan) {
            return redirect()->back();
        }
    }

    public function PaketEdit($id_layanan_foto,Request $request) {
        $update_layanan = Paket::find($id_layanan_foto)->update($request->all());

        if($update_layanan) {
            return redirect()->back();
        }
    }

    public function PaketDelete($id_paket) {
        $delete_layanan_foto = Paket::destroy($id_paket);
        if($delete_layanan_foto) {
            return redirect()->back();
        }
    }
}
