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
     * Tampilkan form login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Tangani proses login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validasi dan autentikasi berdasarkan LoginRequest
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect berdasarkan role
        switch ($user->role) {
            case 'admin':
                return redirect()->intended('/admin/dashboard');
            case 'penyelenggara':
                return redirect()->intended('/penyelenggara/dashboard');
            case 'warga':
                return redirect()->intended('/warga/dashboard');
            default:
                Auth::logout();
                return redirect('/login')->withErrors([
                    'email' => 'Role tidak dikenali.',
                ]);
        }
    }

    /**
     * Logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}