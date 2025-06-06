<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function UsersIndex() {
        $datas = [
           User::all(),
        ];

        return view("content.users.users")->with('datas', $datas);
    }

    public function UsersPost(Request $request) {
        $password_hash = Hash::make($request->password);
        unset($request->password);
        $request->merge(["password" => $password_hash]);
        $create_layanan = User::create($request->all())->save();

        if($create_layanan) {
            return redirect()->back();
        }
    }

    public function UsersEdit($id_layanan_foto,Request $request) {
        $password_hash = Hash::make($request->password);
        unset($request->password);
        $request->merge(["password" => $password_hash]);
        $update_layanan = User::find($id_layanan_foto)->update($request->all());

        if($update_layanan) {
            return redirect()->back();
        }
    }

    public function UsersDelete($id_layanan_foto) {
        $delete_layanan_foto = User::destroy($id_layanan_foto);
        if($delete_layanan_foto) {
            return redirect()->back();
        }
    }
}
