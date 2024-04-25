<?php

use App\Models\Gift;
use App\Models\Sticker;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\HelpPageController;
use App\Http\Controllers\Admin\GiftsController;
use App\Http\Controllers\Admin\StickersController;
use App\Http\Controllers\Admin\VerifieldController;




Route::get('/', [VerifieldController::class, 'home'])->name('home');
Route::get('/about', [VerifieldController::class, 'about'])->name('about');
Route::get('/pricing', [VerifieldController::class, 'price'])->name('price');
Route::get('/help', [HelpPageController::class, 'index'])->name('help.index');
Route::post('/help', [HelpPageController::class, 'store'])->name('help.store');




Route::get('/dashboard', [VerifieldController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function () {
    

    // Gifts
    Route::get('/gifts', [GiftsController::class, 'index'])->name('admin.gifts');
    Route::post('/gifts', [GiftsController::class, 'store'])->name('gifts.store');
    Route::delete('/gifts/{gift}', [GiftsController::class, 'destroy'])->name('gifts.destroy');

    // Stickers
    Route::get('/stickers', [StickersController::class, 'index'])->name('admin.stickers');
    Route::post('/stickers', [StickersController::class, 'store'])->name('stickers.store');
    Route::delete('/stickers/{sticker}', [StickersController::class, 'destroy'])->name('stickers.destroy');

    Route::get('/users', [FirebaseController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [FirebaseController::class, 'useredit'])->name('users.edit');


    Route::put('/users/{id}', [FirebaseController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [FirebaseController::class, 'destroy'])->name('users.destroy');
    Route::get('/Reports', [FirebaseController::class, 'index2'])->name('report.index');

    Route::get('/verifield', [VerifieldController::class, 'index'])->name('users.verify');
    Route::get('/verifield/{id}/edit', [VerifieldController::class, 'edit'])->name('verifield.edit');
    Route::put('/verifield/{id}', [VerifieldController::class, 'update'])->name('verifield.update');
    Route::delete('/verifield/{id}', [VerifieldController::class, 'destroy'])->name('verifield.destroy');

    Route::post('/send-to-firebase',  [FirebaseController::class, 'sendToFirebase'])->name('send-to-firebase');

});



require __DIR__.'/auth.php';
