<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\MovieController;

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
    return redirect('/movies');
});


// Get All Movies
Route::get('/movies', [MovieController::class, 'index'])->name('movies');
Route::get('/movies-pagination/data', [MovieController::class, 'getData'])->name('movies-pagination.getData');

// Scrape Movie
Route::get('/scrape', [MovieController::class, 'scrape'])->name('scrape');









