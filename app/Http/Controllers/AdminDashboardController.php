<?php

namespace App\Http\Controllers;

use App\Models\kegiatanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function index()
    {
        $jumlahKegiatan = kegiatanModel::count();
        $jumlahWarga = UserModel::where('role', 'warga')->count();
        $jumlahPenyelenggara = UserModel::where('role', 'penyelenggara')->count();

        $jumlahKegiatanDiterima = kegiatanModel::where('status', 'diterima')->count();
        $jumlahKegiatanDitolak = kegiatanModel::where('status', 'ditolak')->count();
        $jumlahKegiatanDiproses = kegiatanModel::where('status', 'diproses')->count();

        return view('admin.dashboard', compact(
            'jumlahKegiatan',
            'jumlahWarga',
            'jumlahPenyelenggara',
            'jumlahKegiatanDiterima',
            'jumlahKegiatanDitolak',
            'jumlahKegiatanDiproses'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diproses,disetujui,ditolak',
        ]);

        $kegiatan = kegiatanModel::findOrFail($id);
        $kegiatan->status = $request->status;
        $kegiatan->save();

        return redirect()->route('admin.pengajuan')->with('success', 'Status kegiatan berhasil diperbarui.');
    }

   public function pengajuan()
{
    $kegiatanMenunggu = \App\Models\kegiatanModel::where('status', 'diproses')->get();

    return view('layout.pengajuan', compact('kegiatanMenunggu'));
}



    public function penyelenggara()
    {
        $dataPenyelenggara = \App\Models\UserModel::where('role', 'penyelenggara')->get();
        return view('layout.penyelenggara', compact('dataPenyelenggara'));
    }

    public function kegiatan()
    {
        $semuaKegiatan = kegiatanModel::with('pembuat.profile')->get();
        return view('layout.kegiatan', compact('semuaKegiatan'));
    }

    public function warga()
    {
        $dataWarga = UserModel::with('profile')->where('role', 'warga')->get();
        return view('layout.warga', compact('dataWarga'));
    }

    public function update(Request $request, $id)
{
    $kegiatan = kegiatanModel::findOrFail($id);
    $kegiatan->status = $request->input('status');
    $kegiatan->save();

    return redirect()->route('admin.pengajuan')->with('success', 'Status kegiatan berhasil diperbarui.');
}

}
