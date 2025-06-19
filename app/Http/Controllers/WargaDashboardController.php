<?php

namespace App\Http\Controllers;

use App\Models\kegiatanModel;

class WargaDashboardController extends Controller
{
    public function index()
    {
        // Ambil data kegiatan yang statusnya disetujui
        $kegiatanDisetujui = KegiatanModel::where('status', 'disetujui')->get();

        return view('warga.home', compact('kegiatanDisetujui'));
    }
    public function home()
    {
        $kegiatanDisetujui = kegiatanModel::where('status', 'disetujui')->get();
        return view('warga.home', compact('kegiatanDisetujui'));
    }

    public function about()
    {
        return view('warga.about');
    }
    public function activity()
    {
        $kegiatanDisetujui = kegiatanModel::where('status', 'disetujui')->get();
        return view('warga.activity', compact('kegiatanDisetujui'));
    }
    public function contact()
    {
        return view('warga.contact');
    }
}
