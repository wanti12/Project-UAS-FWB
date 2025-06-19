<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    $user = Auth::user();

    // Arahkan ke dashboard sesuai role
    if ($user->role === 'warga') {
        return redirect()->route('welcome');
    } elseif ($user->role === 'penyelenggara') {
        return redirect()->route('dashbordPenyelenggara');
    } elseif ($user->role === 'pemerintah') {
        return redirect()->route('dashbordAdmin');
    }

    // Jika role tidak dikenali, logout & arahkan ke login
    Auth::logout();
    return redirect()->route('login')->withErrors([
        'role' => 'Role tidak dikenali, silakan hubungi admin.',
    ]);
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
