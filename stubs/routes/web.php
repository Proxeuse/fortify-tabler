<?php

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'editProfile'])->name('profile');
Route::post('/profile/avatar', [\App\Http\Controllers\ProfileController::class, 'updateAvatar'])->name('profile.avatar');
Route::delete('/profile/avatar', [\App\Http\Controllers\ProfileController::class, 'removeOldAvatar'])->name('profile.deleteavatar');
Route::delete('/profile/device', [\App\Http\Controllers\ProfileController::class, ''])->name('profile.deletedevice');