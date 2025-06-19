<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use App\Models\UserProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WargaController extends Controller
{
    public function index()
    {
        $profil = Auth::user()->profil; // asumsi relasi user -> profil
        return view('warga.profilWarga', compact('profil'));
    }

    public function edit()
    {
        $profil = UserProfileModel::firstOrNew(['user_id' => Auth::id()]);
        return view('warga.profilWarga', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'bio' => 'nullable|string|max:500',
        ]);

        try {
            DB::beginTransaction(); // 🔁 Mulai transaksi

            UserProfileModel::updateOrCreate(
                ['user_id' => Auth::id()],
                $request->only('nama', 'alamat', 'no_hp', 'bio')
            );

            DB::commit(); // ✅ Simpan jika semua sukses
            return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack(); // ❌ Gagal, rollback semua
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }


    public function show()
    {
        $profile = UserProfileModel::where('user_id', Auth::id())->first();

        if (!$profile) {
            return redirect()->route('profile.edit')->with('warning', 'Silakan lengkapi profil Anda terlebih dahulu.');
        }

        return view('warga.tampilProfilWarga', compact('profile'));
    }
}
