<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::middleware(['web', 'auth'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'editProfile'])->name('profile');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    Route::delete('/profile/avatar', [ProfileController::class, 'removeOldAvatar'])->name('profile.deleteavatar');
    Route::delete('/profile/device/{id}', [ProfileController::class, 'removeDevice'])->name('profile.deletedevice');
});