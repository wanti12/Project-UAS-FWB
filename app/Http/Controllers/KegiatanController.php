<?php

namespace App\Http\Controllers;

use App\Models\kegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{

    // Tampilkan semua kegiatan milik penyelenggara yang login
    public function index()
    {
        $kegiatans = kegiatanModel::where('dibuat_oleh', Auth::id())->get();
        return view('penyelenggara.dashboard', compact('kegiatans'));
    }

    public function disetujui()
    {
        $kegiatans = kegiatanModel::where('status', 'disetujui')->get();
        return view('layout.kegiatan', compact('kegiatans'));
    }


    public function status()
    {
        $kegiatans = kegiatanModel::where('dibuat_oleh', Auth::id())->get();
        return view('penyelenggara.status', compact('kegiatans'));
    }

    // Form tambah kegiatan
    public function create()
    {
        return view('penyelenggara.create');
    }

    // Simpan kegiatan baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
        ]);

        kegiatanModel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
            'dibuat_oleh' => Auth::id(),
            'status' => 'diajukan',
        ]);
        return redirect()->route('dashboard')->with('success', 'Kegiatan berhasil diajukan!');
    }

    // Form edit kegiatan
    public function edit($id)
    {
        $kegiatan = kegiatanModel::where('id', $id)->where('dibuat_oleh', Auth::id())->firstOrFail();
        return view('penyelenggara.create', compact('kegiatan'));
    }

    // Simpan perubahan kegiatan
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
        ]);

        $kegiatan = kegiatanModel::where('id', $id)->where('dibuat_oleh', Auth::id())->firstOrFail();

        $kegiatan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    // Hapus kegiatan
    public function destroy($id)
    {
        $kegiatan = kegiatanModel::where('id', $id)->where('dibuat_oleh', Auth::id())->firstOrFail();
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
