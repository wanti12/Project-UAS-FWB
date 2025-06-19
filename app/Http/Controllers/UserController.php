<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\UserProfileModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = UserModel::with('profile')
            ->whereIn('role', ['warga', 'penyelenggara']) // ⛔️ sembunyikan admin
            ->get();

        return view('layout.semuaUser', compact('users'));
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);

        if ($user->profile) {
            $user->profile->delete();
        }

        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
