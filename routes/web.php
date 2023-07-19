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








/* landing */

Route::get('/', function () {
    $categories = Category::all();

    $users = User::orderBy('views', 'desc')->take(6)->get();
    return view('landing', compact('categories', 'users'));
});

Route::get('/concours/filter', [ConcourController::class, 'filter'])->name('concours.filter');


/* concours */
Route::get('/concours', function () {

    $unfilteredcategories = Category::all();

    $categories = Category::all();
    // Get the authenticated user's ID

    if (Auth::check()) {

    $userId = Auth::user()->id;
 // Retrieve the concours for the authenticated user with the category ID
 $concours = Concour::where('user_id', $userId)->pluck('category_id')->toArray();

 // Filter the categories based on the concours
 $categories = $unfilteredcategories->filter(function ($category) use ($concours) {
     return !in_array($category->id, $concours);
 });

    }


    $users = User::orderBy('views', 'desc')->take(6)->get();

    $filteredtabcategories =  Category::all();

    return view('concours.index', compact('categories', 'users' , 'unfilteredcategories' , 'filteredtabcategories'));
});


Route::middleware('auth')->group(function () {

    /* dashboard */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /* profile */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');





    /* posts */
    Route::resource('posts', PostController::class);

    /* concour */
    Route::post('/concour', [ConcourController::class, 'submit'])->name('concour.submit');


    /* profiles */
    Route::get('/profiles', [ProfileController::class, 'profiles'])->name('concurrentes.index');



    /* user */
    Route::get('/user', function () {
        return redirect('/user/concours');
    });

    Route::get('/user/concours', [ConcourController::class, 'concours'])->name('user.concours');
    Route::get('/user/posts', [PostController::class, 'userPosts'])->name('user.posts');
    Route::post('/user/upload', [ProfileController::class, 'upload'])->name('user.upload');




    /* Visit User */
    Route::get('/visituser/{id}', function () {

        $authuser = Auth::user();
        if (
            request()->route('id') == $authuser->id
        ) {
            return redirect('/user/concours');
        }

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

    Route::delete('/concour/{concour}', [ConcourController::class, 'destroy'])->name('concour.destroy');
});



require __DIR__ . '/auth.php';
