<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{AdminsController};
use App\Http\Controllers\Auth\{AuthController};
use App\Http\Controllers\Kalender\{KalenderController};
use App\Http\Controllers\Main\{MainController};
use App\Http\Controllers\Notif\{NotifController};
use App\Http\Controllers\Pemesanan\{BackgroundController, FileSentController, LayananFotoController, PaketController, PemesananController, ServisController};
use App\Http\Controllers\Users\{UsersController};
use App\Http\Middleware\{Authenticate};

// Main Routing
Route::prefix("/")->group(function() {
    Route::get("", [MainController::class, 'mainIndex'])->name("main-index");
    Route::get("servis/{slug}", [MainController::class, "servisIndex"])->name("servis-index");
    Route::get("servis/pemesanan/{slug}", [MainController::class,"formPemesananIndex"])->name("form-pemesanan-index");
    Route::get("cekjadwal", [KalenderController::class, 'cekJadwal'])->name("cek-jadwal");
    Route::get("invoice/{uuid}", [MainController::class, 'invoiceIndex'])->name("invoice-index");
    Route::get("success", [MainController::class,"successIndex"])->name("success-index");
    Route::get("kalender", [MainController::class, "kalenderIndex"])->name("kalender-index-main");
    Route::get("chatbot", function() {
        return view("content.main.chatbot");
    });
});

// Admin only Routing
Route::middleware(Authenticate::class)->group(function () {
    Route::prefix("admin")->group(function() {
        Route::get("dashboard", [AdminsController::class, 'adminDashboard'])->name("admin-dashboard");
        Route::get("kalender", [KalenderController::class, 'kalenderIndex'])->name("kalender-index");
        Route::prefix("pemesanan")->group(function() {
            Route::get("", [PemesananController::class, 'pemesananIndex'])->name("pemesanan-index");
            Route::get("{id_pemesanan}", [PemesananController::class, 'pemesananEditIndex'])->name("pemesanan-edit-index");
            Route::get("/bg/{id_pemesanan}", [PemesananController::class, 'pemesananBgEditIndex'])->name("pemesanan-bg-edit-index");
            Route::get("/servis/{id_pemesanan}", [PemesananController::class, 'pemesananServisEditIndex'])->name("pemesanan-servis-edit-index");
            Route::get("/file_sent/{id_pemesanan}", [PemesananController::class, 'pemesananFsEditIndex'])->name("pemesanan-Fs-edit-index");
            Route::put("{id_pemesanan}", [PemesananController::class, 'pemesananEdit'])->name("pemesanan-edit");
            Route::put("/bg/{id_pemesanan}", [PemesananController::class, 'pemesananBgEdit'])->name("pemesanan-bg-edit");
            Route::put("/servis/{id_pemesanan}", [PemesananController::class, 'pemesananServisEdit'])->name("pemesanan-servis-edit");
            Route::put("/file_sent/{id_pemesanan}", [PemesananController::class, 'pemesananFsEdit'])->name("pemesanan-Fs-edit");
            Route::get("hapus/{id_pemesanan}", [PemesananController::class, 'hapusPemesanan'])->name("hapus-pemesanan");
        });

        Route::prefix("layanan-foto")->group(function(){
            Route::get("", [LayananFotoController::class, 'layananFotoIndex'])->name("layanan-foto-index");
            Route::post("", [LayananFotoController::class, 'layananFotoPost'])->name("layanan-foto-post");
            Route::put("{id_layanan_foto}", [LayananFotoController::class, 'layananFotoEdit'])->name("layanan-foto-edit");
            Route::delete("{id_layanan_foto}", [LayananFotoController::class, 'layananFotoDelete'])->name("layanan-foto-delete");
            Route::get("/detail-image/{id_detail_layanan}",[LayananFotoController::class, 'layananDetailFotoDelete'])->name("layanan-detail-foto-delete");
        });
        Route::prefix("background")->group(function(){
            Route::get("", [BackgroundController::class, 'backgroundFotoIndex'])->name("background-foto-index");
            Route::post("", [BackgroundController::class, 'backgroundFotoPost'])->name("background-foto-post");
            Route::put("{id_background}", [BackgroundController::class, 'backgroundFotoEdit'])->name("background-foto-edit");
            Route::delete("{id_background}", [BackgroundController::class, 'backgroundFotoDelete'])->name("background-foto-delete");
        });
        Route::prefix("servis-tambahan")->group(function(){
            Route::get("", [ServisController::class, 'servisTambahanIndex'])->name("servis-tambahan-index");
            Route::post("", [ServisController::class, 'servisTambahanPost'])->name("servis-tambahan-post");
            Route::put("{id_servis}", [ServisController::class, 'servisTambahanEdit'])->name("servis-tambahan-edit");
            Route::delete("{id_servis}", [ServisController::class, 'servisTambahanDelete'])->name("servis-tambahan-delete");
        });
        
        Route::prefix("file-sent")->group(function(){
            Route::get("", [FileSentController::class, 'fileSentIndex'])->name("file-sent-index");
            Route::post("", [FileSentController::class, 'fileSentPost'])->name("file-sent-post");
            Route::put("{id_servis}", [FileSentController::class, 'fileSentEdit'])->name("file-sent-edit");
            Route::delete("{id_servis}", [FileSentController::class, 'fileSentDelete'])->name("file-sent-delete");
        });
        
        Route::prefix("users")->group(function(){
            Route::get("", [UsersController::class, 'usersIndex'])->name("users-index");
            Route::post("", [UsersController::class, 'usersPost'])->name("users-post");
            Route::put("{id_user}", [UsersController::class, 'usersEdit'])->name("users-edit");
            Route::delete("{id_user}", [UsersController::class, 'usersDelete'])->name("users-delete");
        });
        
        Route::prefix("paket")->group(function(){
            Route::get("", [PaketController::class, 'paketIndex'])->name("paket-index");
            Route::post("", [PaketController::class, 'paketPost'])->name("paket-post");
            Route::put("{id_servis}", [PaketController::class, 'paketEdit'])->name("paket-edit");
            Route::delete("{id_paket}", [PaketController::class, 'paketDelete'])->name("paket-delete");
        });

        Route::get("notif", [NotifController::class, 'notifIndex'])->name("notif-index");
        Route::post("notif", [NotifController::class, 'notifPost'])->name("notif-post");
        Route::get("notif/hapus/{email}", [NotifController::class, 'hapusNotif'])->name("hapus-notif");
    });
});


// Authentication Admin
Route::get("admin/auth/login", [AuthController::class, 'loginIndex'])->name("login-index");
Route::post("admin/auth/login", [AuthController::class, 'login'])->name("login");
Route::get("admin/auth/logout", [AuthController::class, 'logout'])->name("logout");
