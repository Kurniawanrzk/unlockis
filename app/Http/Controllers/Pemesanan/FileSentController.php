<?php

namespace App\Http\Controllers\Pemesanan;

use App\Http\Controllers\Controller;
use App\Models\FileSent;
use Illuminate\Http\Request;

class FileSentController extends Controller
{
    public function FileSentIndex() {
        $datas = [
           FileSent::all()
        ];

        return view("content.pemesanan.file_sent")->with('datas', $datas);
    }

    public function FileSentPost(Request $request) {
        $create_layanan = FileSent::create($request->all())->save();

        if($create_layanan) {
            return redirect()->back();
        }
    }

    public function FileSentEdit($id_layanan_foto,Request $request) {
        $update_layanan = FileSent::find($id_layanan_foto)->update($request->all());

        if($update_layanan) {
            return redirect()->back();
        }
    }

    public function FileSentDelete($id_layanan_foto) {
        $delete_layanan_foto = FileSent::destroy($id_layanan_foto);
        if($delete_layanan_foto) {
            return redirect()->back();
        }
    }
}
