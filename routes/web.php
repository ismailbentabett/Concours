<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ConcourController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
    return view('landing');
});

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/profiles', function () {
    return view('concurrentes.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/user');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/posts', function () {
        return view('user.posts');
    })-> name('user.posts');


    Route::get('/user', function () {
        return redirect('/user/concours');
    });

    Route::get('/user/concours', function () {
        return view('user.concours');
    })-> name('user.concours');

    Route::get('/concours', function () {

        $categories = Category::all();
    return view('concours.index', compact('categories'));
    });


    Route::resource('posts', PostController::class);
    Route::post('/concour', [ConcourController::class, 'submit'])->name('concour.submit');




});

Route::post('/user/upload', [ProfileController::class, 'upload'])->name('user.upload');


require __DIR__.'/auth.php';
