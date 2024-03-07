<?php

use App\Models\Sticker;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GiftsController;
use App\Http\Controllers\Admin\StickersController;
use App\Models\Gift;

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
    $stickerCount = Sticker::count();
    $giftCount = Gift::count();
    return view('dashboard' , compact('stickerCount', 'giftCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

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


    // Admob Settings
    Route::get('/admob-settings', 'Admin\AdmobSettingsController@index')->name('admin.admob_settings');

    // Spam Check Features
    Route::get('/spam-check-features', 'Admin\SpamCheckFeaturesController@index')->name('admin.spam_check_features');

    // Agora Settings
    Route::get('/agora-settings', 'Admin\AgoraSettingsController@index')->name('admin.agora_settings');

    // Interstitial
    Route::get('/interstitial', 'Admin\InterstitialController@index')->name('admin.interstitial');

    // Upgrade
    Route::get('/upgrade', 'Admin\UpgradeController@index')->name('admin.upgrade');

    // Push Notification
    Route::get('/push-notification', 'Admin\PushNotificationController@index')->name('admin.push_notification');

    // Search Users
    Route::get('/search-users', 'Admin\SearchUsersController@index')->name('admin.search_users');

    // Profile
    Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');

    // Settings
    Route::get('/settings', 'Admin\SettingsController@index')->name('admin.settings');

    // Logout
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
});




require __DIR__.'/auth.php';
