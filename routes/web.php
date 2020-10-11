<?php

use App\Http\Livewire\Find;
use App\Http\Livewire\Provider\Dashboard;
use App\Http\Livewire\Search;
use App\Http\Livewire\ServiceProvider;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('app', Find::class)->name('find');

Route::get('provider', ServiceProvider::class)->name('provider');

Route::get('search', Search::class)->name('search');

Route::get('profile', Dashboard::class)->name('profile');
