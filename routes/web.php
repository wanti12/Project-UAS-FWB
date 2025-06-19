    <?php

    use App\Http\Controllers\AdminDashboardController;
    use App\Http\Controllers\KegiatanController;
    use App\Http\Controllers\PendaftaranController;
    use App\Http\Controllers\PengajuanController;
    use App\Http\Controllers\PenyelenggaraDashboardController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\UserProfileController;
    use App\Http\Controllers\WargaController;
    use App\Http\Controllers\WargaDashboardController;
    use App\Models\kegiatanModel;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        $kegiatanDisetujui = kegiatanModel::where('status', 'disetujui')->get();
        return view('welcome', compact('kegiatanDisetujui'));
    });

    // Route Otentikasi (Login, Register, dsb.)
    require __DIR__ . '/auth.php';

    // Testing (khusus role pemerintah)
    Route::get('/testing', function () {
        return 'cobaaaa';
    })->middleware(['auth', 'role:pemerintah']);

    // Group untuk user yang sudah login dan terverifikasi
    Route::middleware(['auth', 'verified'])->group(function () {

        Route::get('/dashboard', function () {
            $user = Auth::user();

            if (!$user) {
                abort(403, 'Unauthorized');
            }

            return match ($user->role) {
                'pemerintah'    => app(AdminDashboardController::class)->index(),
                'penyelenggara' => app(PenyelenggaraDashboardController::class)->index(),
                default         => app(WargaDashboardController::class)->index(),
            };
        })->name('dashboard');

        //Profile Routes
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });

    Route::get('/tes2', [AdminDashboardController::class, 'index'])->name('dashbordAdmin');
    Route::get('/tes3', [PenyelenggaraDashboardController::class, 'index'])->name('dashbordPenyelenggara');


    Route::get('/tes1', [WargaDashboardController::class, 'home'])->name('welcome');
    Route::get('/home', [WargaDashboardController::class, 'home'])->name('warga.home');
    Route::get('/about', [WargaDashboardController::class, 'about'])->name('warga.about');
    Route::get('/activity', [WargaDashboardController::class, 'activity'])->name('warga.activity');
    Route::get('/contact', [WargaDashboardController::class, 'contact'])->name('warga.contact');

    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    Route::middleware(['auth', 'role:penyelenggara'])->group(function () {
        Route::resource('kegiatan', KegiatanController::class);
    });

    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/status-kegiatan', [KegiatanController::class, 'status'])->name('kegiatan.status');

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admin')->group(function () {
        Route::get('/status', [AdminDashboardController::class, 'dashboard']);
    });

    Route::get('/tes-pengajuan', function () {
        $kegiatanMenunggu = kegiatanModel::where('status', 'diproses')->get();
        return view('layout.pengajuan', compact('kegiatanMenunggu'));
    });
    Route::middleware(['auth', 'role:pemerintah'])->group(function () {
        Route::put('/pengajuan/{id}/status', [PengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');
        Route::get('/kegiatan', [KegiatanController::class, 'disetujui'])->name('admin.kegiatan');
        Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('admin.pengajuan');
        Route::get('/user', [UserController::class, 'index'])->name('admin.user');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });


    Route::post('/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('/penyelenggara/daftar-warga', [PenyelenggaraDashboardController::class, 'daftarWarga'])
        ->middleware(['auth', 'role:penyelenggara'])
        ->name('penyelenggara.daftarWarga');

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/profile/edit/admin', [UserProfileController::class, 'editadmin'])->name('profile.editadmin');
        Route::post('/profile/edit', [UserProfileController::class, 'update'])->name('admin_penyelenggara.profile');
    });

    Route::middleware(['auth', 'role:warga'])->group(function () {
        Route::get('/warga/profil', [WargaController::class, 'index'])->name('warga.profile');
        Route::get('/edit', [WargaController::class, 'edit'])->name('profil.edit');
        Route::post('/update', [WargaController::class, 'update'])->name('profil.update');
        Route::get('/profile/show', [WargaController::class, 'show'])->name('profile.show');
    });

    // Untuk PENYELENGGARA
    Route::middleware(['auth'])->group(function () {
        Route::get('/penyelenggara/profile', [UserProfileController::class, 'show'])->name('penyelenggara.profile');
        Route::get('/penyelenggara/profile/edit', [UserProfileController::class, 'editPenyelenggara'])->name('penyelenggara.profile.edit');
        Route::post('/penyelenggara/profile/update', [UserProfileController::class, 'updatePenyelenggara'])->name('penyelenggara.profile.update');
    });
