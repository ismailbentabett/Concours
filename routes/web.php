<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ConcourController;
use App\Models\Category;
use App\Models\Concour;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/welcome', function () {
    return view('welcome');
});




Route::get('/profiles', [ProfileController::class, 'profiles'])->name('concurrentes.index');


Route::get('/', function () {
    $categories = Category::all();

    $users = User::orderBy('views', 'desc')->take(6)->get();
    return view('landing', compact('categories' , 'users'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/user', function () {
        return redirect('/user/concours');
    });

    Route::get('/user/concours', [ConcourController::class, 'concours'])->name('user.concours');
    Route::get('/user/posts', [PostController::class, 'userPosts'])->name('user.posts');


    Route::get('/visituser/{id}', function () {
        $id = request()->route('id');
        $user = User::findOrFail($id);
        $user->views++;
        $user->save();
        $authuser = Auth::user();
        if ($id == $authuser->id) {
            return redirect('/user/concours');
        } else {
            return redirect('/visituser/' . $id . '/concours');
        }
    });

    Route::get('/visituser/{id}/posts', [PostController::class, 'getUserPosts'])->name('visituser.posts');

    Route::get('/visituser/{id}/concours', [ConcourController::class, 'getUserConcours'])->name('visituser.concours');

    Route::get('/concours', function () {

        $categories = Category::all();
        $users = User::orderBy('views', 'desc')->take(6)->get();

        return view('concours.index', compact('categories', 'users'));
    });



    Route::resource('posts', PostController::class);
    Route::post('/concour', [ConcourController::class, 'submit'])->name('concour.submit');






});

Route::post('/user/upload', [ProfileController::class, 'upload'])->name('user.upload');


require __DIR__ . '/auth.php';
