<?php

namespace App\Http\Controllers;

use App\Models\pendaftaranModel;
use Illuminate\Support\Facades\Auth;

class PenyelenggaraDashboardController extends Controller
{
    public function index()
    {
        return view('penyelenggara.dashboard');
    }

    public function daftarWarga()
{
    $user = Auth::user(); // penyelenggara
    $pendaftaran = pendaftaranModel::whereHas('kegiatan', function ($query) use ($user) {
        $query->where('dibuat_oleh', $user->id);
    })->with(['warga.profile', 'kegiatan'])->get();

    return view('penyelenggara.daftarWarga', compact('pendaftaran'));
}
}
