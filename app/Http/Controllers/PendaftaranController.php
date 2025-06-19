<?php

namespace App\Http\Controllers;

use App\Models\pendaftaranModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
        ]);

        try {
            DB::beginTransaction(); // 🔁 Mulai transaksi

            $sudahTerdaftar = pendaftaranModel::where('kegiatan_id', $request->kegiatan_id)
                ->where('warga_id', Auth::id())
                ->exists();

            if ($sudahTerdaftar) {
                return back()->with('error', 'Anda sudah mendaftar pada kegiatan ini.');
            }

            pendaftaranModel::create([
                'kegiatan_id' => $request->kegiatan_id,
                'warga_id' => Auth::id(),
                'status_pendaftaran' => 'menunggu',
            ]);

            DB::commit(); // ✅ Simpan jika semua sukses

            return back()->with('success', 'Berhasil mendaftar kegiatan!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Gagal daftar: ' . $e->getMessage()); // Tambahkan log
            return back()->with('error', 'Gagal mendaftar kegiatan. Silakan coba lagi.');
        }
    }
}
