<?php

namespace App\Http\Controllers\Notif;

use App\Http\Controllers\Controller;
use App\Models\Notif;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function notifIndex() {
        return view('content.notif.notif')->with("datas", [Notif::all()]);
    }

    public function notifPost(Request $request) {
        $request->email = str_replace(' ', '', $request->email);
        $email_arr = explode(",", $request->email);
        foreach($email_arr as $email) {
            $notif = Notif::create([
                "email" => $email
            ]);
        }

        return redirect()->back();
    }

    public function hapusNotif($email) {
        $notif = Notif::where('email', $email)->first();
        $notif->delete();

        return redirect()->back();
    }
}
