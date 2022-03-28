<?php

use App\Http\Controllers\SystemsNameGenerator;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/systems-generate', SystemsNameGenerator::class);
