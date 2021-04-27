<?php

use Illuminate\Support\Facades\Route;

Route::view('blog','robinpress::test');

Route::get('controller', [\Nhrrob\Robinpress\Http\Controllers\TestController::class, 'index']);