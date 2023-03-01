<?php

use App\Models\Cars;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\CarsController as AdminCars;

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
    $data = Cars::all();
    return view('welcome', compact('data'));
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/createcar', [AdminCars::class, 'create'])->name('createcar');
    Route::post('/storecar', [AdminCars::class, 'store'])->name('storecar');
    Route::get('/editcar/{id}', [AdminCars::class, 'edit'])->name('editcar');
    Route::post('/update/{id}', [AdminCars::class, 'update'])->name('updatecar');
    Route::get('/deletecar/{id}', [AdminCars::class, 'destroy'])->name('deletecar');
});
Route::get('/dashboard', [AdminCars::class, 'index'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
