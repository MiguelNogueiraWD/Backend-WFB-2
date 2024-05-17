<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissionController;




Route::middleware("auth")->group(function () {
    Route::prefix('/profile')->group(function (){
        Route::get('/', function () {
            return view('profile.index');
        })->name('profile');

        Route::get('/edit', [ProfileController::class,'edit'])->name('profile.edit');
        Route::post('/update', [ProfileController::class,'update'])->name('profile.update');

        Route::get('/editpassword', [ProfileController::class,'editpassword'])->name('profile.editpassword');
        Route::post('/updatepassword', [ProfileController::class,'updatepassword'])->name('profile.updatepassword');

    });

    Route::prefix('/missions')->group(function (){
        Route::get('/', [MissionController::class, 'index'])->name('missions.index');
        Route::get('/create', [MissionController::class, 'create'])->name('missions.create');
        Route::post('/', [MissionController::class, 'store'])->name('missions.store');
        Route::get('/{mission}/edit', [MissionController::class, 'edit'])->name('missions.edit');
        Route::put('/{mission}', [MissionController::class, 'update'])->name('missions.update');
    });


    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('log');
});

Route::middleware('auth:chauffeur')->group(function () {
    Route::prefix('/chauffeur')->group(function () {
        Route::prefix('/profile')->group(function () {
            Route::get('/', function () {
                return view('chauffeur.profile.index');
            })->name('chauffeur.profile');

            Route::get('/edit', [ProfileController::class, 'editChauffeur'])->name('chauffeur.profile.edit');
            Route::post('/update', [ProfileController::class, 'updateChauffeur'])->name('chauffeur.profile.update');

            Route::get('/editpassword', [ProfileController::class, 'editPasswordChauffeur'])->name('chauffeur.profile.editpassword');
            Route::post('/updatepassword', [ProfileController::class, 'updatePasswordChauffeur'])->name('chauffeur.profile.updatepassword');

        });

        Route::get('/missions', [MissionController::class, 'chauffeurIndex'])->name('chauffeur.missions.index');
        Route::get('/missions/{mission}', [MissionController::class, 'show'])->name('chauffeur.missions.show');
        Route::patch('/missions/{mission}/start', [MissionController::class, 'startMission'])->name('chauffeur.missions.start');
        Route::patch('/missions/{mission}/stop', [MissionController::class, 'stopMission'])->name('chauffeur.missions.stop');
    });

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login/chauffeur');
    })->name('chauffeur_logout');
});


    Route::get('/', function () {
        return view('welcome'); 
    })->name('home');

Route::prefix('login')->group(function (){
    Route::get('/', [AuthController::class,'login'])->name('login');
    Route::post('/', [AuthController::class,'loginPost'])->name("login.post");

    Route::get('/chauffeur', [AuthController::class, 'loginChauffeur'])->name('login_chauffeur');
    Route::post('/chauffeur', [AuthController::class, 'loginChauffeurPost'])->name('login_chauffeur.post');
});

Route::prefix('register')->group(function (){
    Route::get('/', [AuthController::class,'register'])->name('register');
    Route::post('/', [AuthController::class,'registerPost'])->name("register.post");

    Route::get('/chauffeur', [AuthController::class, 'registerChauffeur'])->name('register_chauffeur');
    Route::post('/chauffeur', [AuthController::class, 'registerChauffeurPost'])->name('register_chauffeur.post');
});




Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/forget-password', [ResetPasswordController::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ResetPasswordController::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset.password.post');

