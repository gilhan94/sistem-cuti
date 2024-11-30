<?php

use App\Http\Controllers\Logout;
use App\Livewire\AdminUser;
use App\Livewire\AjuanCuti;
use App\Livewire\CutiSaya;
use App\Livewire\DaftarPengajuanCuti;
use App\Livewire\Dashboard;
use App\Livewire\Divisi;
use App\Livewire\JenisCuti;
use App\Livewire\KaryawanUser;
use App\Livewire\Login;
use App\Livewire\SisaCuti;
use App\Livewire\SupUser;
use App\Livewire\UserOptions;
use Illuminate\Support\Facades\Route;

Route::get("/", Login::class)->name("login")->middleware("guest");

Route::middleware("auth")->prefix("dashboard")->group(function () {
    // Application Route
    Route::get("/", Dashboard::class)->name("dashboard");
    Route::get('/logout', [Logout::class, "logout"])->name('logout');

    // Admin Route 
    Route::get("/divisi", Divisi::class)->name("divisi");
    Route::get("/jenis-cuti", JenisCuti::class)->name("jenis-cuti");
    Route::get("/user-options/{id}", UserOptions::class)->name("user-options");
    Route::get("/admin-user", AdminUser::class)->name("admin-user");
    Route::get("/sup-user", SupUser::class)->name("sup-user");
    Route::get("/karyawan-user", KaryawanUser::class)->name("karyawan-user");
    Route::get("/daftar-pengajuan-cuti", DaftarPengajuanCuti::class)->name("daftar-pengajuan-cuti");

    // Karyawan
    Route::get("/pengajuan-cuti", AjuanCuti::class)->name("pengajuan-cuti");
    Route::get("/sisa-cuti", SisaCuti::class)->name("sisa-cuti");
    Route::get("/cuti-saya", CutiSaya::class)->name("cuti-saya");
});
