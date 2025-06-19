<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
   $role = Auth::user()->role;

    return match ($role) {
        'pemerintah' => redirect()->route('pemerintah.dashboard'),
        'penyelenggara' => redirect()->route('pemerintah.dashboard'),
        'warga' => redirect()->route('warga.dashboard'),
        default => abort(403),
    };
}

}
