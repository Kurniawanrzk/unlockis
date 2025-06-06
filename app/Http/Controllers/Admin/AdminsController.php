<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
class AdminsController extends Controller
{
    public function adminDashboard()
    {
      $data = [Pemesanan::with('pelanggan')->with('paket')->orderBy('id_pemesanan', "DESC")->paginate(5)];
      return view('content.dashboard.dashboards-admin')->with('data', $data);
    }
  
}
