<?php

namespace App\Http\Controllers\Pemesanan;

use App\Http\Controllers\Controller;
use App\Models\Background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackgroundController extends Controller
{
    public function backgroundFotoIndex() {
        $datas = [
           Background::all()
        ];

        return view("content.pemesanan.background")->with('datas', $datas);
    }

    public function backgroundFotoPost(Request $request) {
        // 1. Validate the request
        $validatedData = $request->validate([
            'nama_background' => 'required|string|max:255',
            'kapasitas_min'   => 'required|integer|min:1',
            'kapasitas_max'   => 'required|integer|gte:kapasitas_min', // ensure max is greater than or equal to min
            'gambar_bg'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048' // limit file size to 2MB
        ]);
    
        // 2. Handle file upload (if there is a file)
        $filePath = null;
        if ($request->hasFile('gambar_bg')) {
            $file = $request->file('gambar_bg');
            // Store the file in the 'public/backgrounds' directory and get the path
            $filePath = $file->store('image_support/backgrounds', 'public');
        }
    
        // 3. Create a new record in the database
        $backgroundFoto = new Background(); // Assuming you have a model for this
        $backgroundFoto->nama_background = $validatedData['nama_background'];
        $backgroundFoto->kapasitas_min = $validatedData['kapasitas_min'];
        $backgroundFoto->kapasitas_max = $validatedData['kapasitas_max'];
        $backgroundFoto->gambar_bg = $filePath; // Store the path of the image, if uploaded
    
        // Save the record to the database
        $backgroundFoto->save();
    
        // 4. Redirect or respond with success
        return redirect()->back()->with('success', 'Layanan Foto berhasil ditambahkan!');
    }
    
    public function backgroundFotoEdit(Request $request, $id)
    {
        // 1. Validate the request
        $validatedData = $request->validate([
            'nama_background' => 'required|string|max:255',
            'kapasitas_min'   => 'required|integer|min:1',
            'kapasitas_max'   => 'required|integer|gte:kapasitas_min', // ensure max is greater than or equal to min
            'gambar_bg'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048' // limit file size to 2MB
        ]);
    
        // 2. Find the existing background record
        $backgroundFoto = Background::findOrFail($id);

        // 3. Handle file upload (if a new file is uploaded)
        if ($request->hasFile('gambar_bg')) {
            // Delete the old file if it exists
            if ($backgroundFoto->gambar_bg && Storage::disk('public')->exists($backgroundFoto->gambar_bg)) {
                Storage::disk('public')->delete($backgroundFoto->gambar_bg);
            }
    
            // Store the new file and get the file path
            $file = $request->file('gambar_bg');
            $filePath = $file->store('backgrounds', 'public');
    
            // Update the file path in the database
            $backgroundFoto->gambar_bg = $filePath;
        }
    
        // 4. Update other fields
        $backgroundFoto->nama_background = $validatedData['nama_background'];
        $backgroundFoto->kapasitas_min = $validatedData['kapasitas_min'];
        $backgroundFoto->kapasitas_max = $validatedData['kapasitas_max'];
    
        // 5. Save the updated record to the database
        $backgroundFoto->save();
    
        // 6. Redirect or respond with success
        return redirect()->back()->with('success', 'Layanan Foto berhasil diupdate!');
    }
    
    public function backgroundFotoDelete($id_background) {
        $bg_delete = Background::destroy($id_background);
        if($bg_delete) {
            return redirect()->back();
        }}
}
