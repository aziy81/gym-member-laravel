<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/members', [MemberController::class, 'index'])->name('members.index'); // Menampilkan daftar member
    Route::get('/members/create', [MemberController::class, 'create'])->name('members.create'); // Halaman form tambah member
    Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit'); // Halaman form edit member
    Route::post('/members', [MemberController::class, 'store'])->name('members.store'); // Menyimpan member baru
    Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update'); // Mengupdate member yang ada
    Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy'); // Menghapus member

});

require __DIR__.'/auth.php';
