<?php

namespace App\Http\Controllers\Pemesanan;

use App\Http\Controllers\Controller;
use App\Models\{LayananFoto, DetailLayananFoto};
use Illuminate\Http\Request;

class LayananFotoController extends Controller
{
    public function layananFotoIndex() {
        $datas = [
           LayananFoto::all()
        ];

        return view("content.pemesanan.layanan_foto")->with('datas', $datas);
    }

    public function layananFotoPost(Request $request) {
        $request->merge([
            "slug" => strtolower(implode("-",explode(" ", $request->nama_layanan_foto)))
        ]);
        $images = $request->gambar;
        unset($request->gambar);
        $filePath = null;
        $detailLayanan = new DetailLayananFoto();
        $create_layanan = LayananFoto::create($request->all());
        $create_layanan->save();

        if ($request->hasFile('gambar')) {
           foreach($images as $image) {
            $filePath = $image->store("image_support/layanan_foto", 'public');
            $detailLayanan->create([
                "gambar" => $filePath,
                "id_layanan_foto" => $create_layanan->id_layanan_foto
            ])->save();
           }
        }

        if($create_layanan) {
            return redirect()->back();
        }
    }

    public function layananFotoEdit($id_layanan_foto,Request $request) {
        $request->merge([
            "slug" => strtolower(implode("-",explode(" ", $request->nama_layanan_foto)))
        ]);
        $images = $request->gambar;
        unset($request->gambar);
        $filePath = null;
        $detailLayanan = new DetailLayananFoto();
       
        $update_layanan = LayananFoto::find($id_layanan_foto)->update($request->all());
        if ($request->hasFile('gambar')) {
            foreach($images as $image) {
             $filePath = $image->store("image_support/layanan_foto", 'public');
             $detailLayanan->create([
                 "gambar" => $filePath,
                 "id_layanan_foto" => $id_layanan_foto
             ])->save();
            }
         }

        if($update_layanan) {
            return redirect()->back();
        }
    }

    public function layananFotoDelete($id_layanan_foto) {
        $delete_layanan_foto = LayananFoto::destroy($id_layanan_foto);
        if($delete_layanan_foto) {
            return redirect()->back();
        }
    }

    public function layananDetailFotoDelete($id_detail_layanan) {
        $delete = DetailLayananFoto::destroy($id_detail_layanan);
        if($delete) {
            return redirect()->back();
        }
    }
}
