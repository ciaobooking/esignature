<?php

use Illuminate\Support\Facades\Route;
use ESignatures\Http\Controllers\HooksController;

Route::prefix('e-signatures')->group(function () {
    Route::post('/hook/received', HooksController::class . '@received')->name('e-signatures.hook.received');
});

