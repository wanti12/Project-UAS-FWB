<?php

namespace App\Http\Controllers;

use App\Models\kegiatanModel;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
{
    $kegiatan = kegiatanModel::where('status', 'diajukan')->latest()->get();

    return view('layout.pengajuan', compact('kegiatan'));
}

public function updateStatus(Request $request, $id)
{
    // Validasi input status
    $request->validate([
        'status' => 'required|in:diajukan,disetujui,ditolak'
    ]);

    // Cari kegiatan berdasarkan ID
    $kegiatan = kegiatanModel::findOrFail($id);

    // Update status
    $kegiatan->status = $request->status;
    $kegiatan->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.pengajuan')->with('success', 'Status kegiatan berhasil diperbarui.');
}
}
