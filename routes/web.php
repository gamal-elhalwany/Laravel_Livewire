<?php

use App\Livewire\Posts\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Posts\Create;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

	Route::get('/', [HomeController::class, 'index'])->name('home');
	Route::get('/create-post', [HomeController::class, 'create'])->name('post.create');
	Route::post('/create-post', [HomeController::class, 'store'])->name('insert.post');
	Route::get('/post/{post}', [HomeController::class, 'show'])->name('post.show');
	Route::put('/edit-post/{post}/update', [HomeController::class, 'update'])->name('update.post');
	// Route::delete('/posts/{post}/delete', [HomeController::class, 'destroy'])->name('post.destroy');

	
	// User Profile Routes.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
