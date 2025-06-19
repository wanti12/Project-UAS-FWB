<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfileModel;

class UserProfileController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        $profile = UserProfileModel::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('penyelenggara.profile')->with('warning', 'Silakan lengkapi profil Anda terlebih dahulu.');
            
        }

        return view('tampilProfil', compact('profile'));
    }

   
    public function showAdmin()
    {
        dd('MASUK KE showAdmin');
        $profile = UserProfileModel::where('user_id', Auth::id())->first();

        if (!$profile) {
            return redirect()->route('admin.profile')->with('warning', 'Silakan lengkapi profil Anda terlebih dahulu.');
        }

        return view('admin.tampilProfilAdmin', compact('profile'));
    }


    // public function edit()
    // {
    //     $profile = UserProfileModel::firstOrCreate(
    //         ['user_id' => Auth::id()],
    //         ['nama' => '', 'alamat' => '', 'no_hp' => '', 'bio' => '']
    //     );
    //     return view('profil', compact('profile'));
    // }

    public function editadmin()
    {
        $profile = UserProfileModel::firstOrCreate(
            ['user_id' => Auth::id()],
            ['nama' => '', 'alamat' => '', 'no_hp' => '', 'bio' => '']
        );
        return view('admin.profilAdmin', compact('profile'));
    }

    // public function editwarga()
    // {
    //     $profile = UserProfileModel::firstOrCreate(
    //         ['user_id' => Auth::id()],
    //         ['nama' => '', 'alamat' => '', 'no_hp' => '', 'bio' => '']
    //     );
    //     return view('admin.profil', compact('profile'));
    // }

    public function update(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_hp'  => 'nullable|string|max:20',
            'bio'    => 'nullable|string|max:500',
        ]);

        $profile = UserProfileModel::firstOrCreate(['user_id' => Auth::id()]);

        $data = $request->only(['nama', 'alamat', 'no_hp', 'bio']);

        $profile->update($data);

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }


    // UserProfileController.php

    // public function adminPenyelenggaraProfile()
    // {
    //     $user = Auth::user();
    //     return view('profile.admin-penyelenggara', compact('user'));
    // }


    public function wargaProfile()
    {
        $user = Auth::user();
        $profile = UserProfileModel::where('user_id', $user->id)->first();

        return view('warga.profilWarga', compact('user', 'profile'));
    }

//     public function penyelenggaraProfile()
// {
//     $user = Auth::user();
//     $profile = $user->profile; // sesuaikan relasi jika bukan 'profile'

//     return view('tampilProfil', compact('profile'));
// }

// Form edit profil penyelenggara
public function editPenyelenggara()
{
    $user = Auth::user();
    $profile = $user->profile;

    return view('profil', compact('profile'));
}

// Update profil penyelenggara
public function updatePenyelenggara(Request $request)
{
    $user = Auth::user();
    $profile = $user->profile;

    $request->validate([
        'nama'   => 'required|string|max:255',
        'alamat' => 'nullable|string',
        'no_hp'  => 'nullable|string',
        'bio'    => 'nullable|string',
    ]);

    $profile->update([
        'nama'   => $request->nama,
        'alamat' => $request->alamat,
        'no_hp'  => $request->no_hp,
        'bio'    => $request->bio,
    ]);

    return redirect()->route('penyelenggara.profile')->with('success', 'Profil berhasil diperbarui.');
}
public function updateAdmin(Request $request)
{
    $user = Auth::user();
    $profile = $user->profile;

    $request->validate([
        'nama'   => 'required|string|max:255',
        'alamat' => 'nullable|string',
        'no_hp'  => 'nullable|string',
        'bio'    => 'nullable|string',
    ]);

    $profile->update([
        'nama'   => $request->nama,
        'alamat' => $request->alamat,
        'no_hp'  => $request->no_hp,
        'bio'    => $request->bio,
    ]);

    return redirect()->route('admin.profile.update')->with('success', 'Profil berhasil diperbarui.');
}
}


