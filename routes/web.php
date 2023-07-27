<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ConcourController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LikeController;
use App\Models\Category;
use App\Models\Concour;
use App\Models\Post;
use App\Models\User;
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







Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

/* landing */

Route::get('/', function () {
    $categories = Category::take(6)->get();

    $users = User::withCount(['posts', 'concours'])->get();

    foreach ($users as $user) {
        $user->postslikes =  $user->posts->sum(function ($post) {
            return $post->likes->count();
        });

        $user->concourslikes =  $user->concours->sum(function ($concour) {
            return $concour->likes->count();
        });

        $user->save();
    }

    // Order users by the sum of their posts and concours likes
    $users = $users->sortByDesc(function ($user) {
        return $user->postslikes + $user->concourslikes + $user->likes->count();
    });

    // Take the top 6 users
    $topUsers = $users->take(6);



    return view('landing', compact('categories', 'users', 'topUsers'));
})->name('landing');

Route::get('terms', function () {
    return view('terms');
})->name('terms');


Route::get('/concours/filter', [ConcourController::class, 'filter'])->name('concours.filter');


/* concours */
Route::get('/concours', function () {

    $unfilteredcategories = Category::all();

    $categories = Category::take(6)->get();
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

    return view('concours.index', compact('categories', 'users', 'unfilteredcategories', 'filteredtabcategories'));
});


Route::middleware(['auth'])->group(function () {

    /* dashboard */


    /* profile */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');





    /* posts */
    Route::resource('posts', PostController::class);
    Route::post('/like-post/{id}', [LikeController::class, 'likePost'])->name('like.post');
    Route::post('/unlike-post/{id}', [LikeController::class, 'unlikePost'])->name('unlike.post');




    /* concour */
    Route::post('/concour', [ConcourController::class, 'submit'])->name('concour.submit');

    Route::post('/like-concour/{id}', [LikeController::class, 'likeConcour'])->name('like.concour');
    Route::post('/unlike-concour/{id}', [LikeController::class, 'unlikeConcour'])->name('unlike.concour');



    /* profiles */
    Route::get('/profiles', [ProfileController::class, 'profiles'])->name('concurrentes.index');



    /* user */
    Route::get('/user', function () {



        return redirect('/user/concours');
    });

    Route::get('/user/concours', [ConcourController::class, 'concours'])->name('user.concours');
    Route::get('/user/posts', [PostController::class, 'userPosts'])->name('user.posts');
    Route::post('/user/upload', [ProfileController::class, 'upload'])->name('user.upload');
    Route::post('/like-user/{id}', [LikeController::class, 'likeUser'])->name('like.user');
    Route::post('/unlike-user/{id}', [LikeController::class, 'unlikeUser'])->name('unlike.user');


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

Route::middleware(['auth', 'role:admin'])->prefix('dashboard')->group(function () {

    Route::get('/', function () {
        return redirect('/dashboard/admin');
    })->name('dashboard');


    Route::get('/admin', function () {
        return redirect('/dashboard/admin/categories');
    })->name('dashboard');;
    Route::get('/admin/categories', [AdminController::class, 'indexCategories'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [AdminController::class,  'createCategory'])->name('admin.categories.create');
    Route::post('/admin/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::get('/admin/categories/{id}/edit', [AdminController::class,  'editCategory'])->name('admin.categories.edit');
    Route::put('/admin/categories/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
    Route::delete('/admin/categories/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categories.delete');
    Route::get('/admin/posts', [AdminController::class, 'indexPosts'])->name('admin.posts.index');
    Route::delete('/admin/posts/{id}', [AdminController::class, 'deletePost'])->name('admin.posts.delete');
    Route::get('/admin/users', [AdminController::class, 'indexUsers'])->name('admin.users.index');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/admin/candidates', [AdminController::class, 'listCandidates'])->name('admin.candidates.index');
    Route::delete('/admin/candidates/{id}', [AdminController::class, 'deleteCandidate'])->name('admin.candidates.delete');
    Route::get('/admin/concours', [AdminController::class, 'indexConcours'])->name('admin.concours.index');
    Route::get('/admin/concours/{id}/edit', [AdminController::class, 'editConcours'])->name('admin.concours.edit');
    Route::put('/admin/concours/{id}', [AdminController::class, 'updateConcours'])->name('admin.concours.update');
    Route::delete('/admin/concours/{id}', [AdminController::class, 'destroyConcours'])->name('admin.concours.destroy');
    Route::get('/admin/inbox', [MessageController::class, 'index'])->name('admin.inbox.index');
    Route::get('/admin/inbox/{id}', [MessageController::class, 'show'])->name('admin.inbox.show');
    Route::delete('/admin/inbox/{id}', [MessageController::class, 'destroy'])->name('admin.inbox.destroy');
    Route::get('/admin/makeadmin/{id}', [AdminController::class, 'makeAdmin'])->name('admin.makeadmin');
    Route::get('/admin/unmakeadmin/{id}', [AdminController::class, 'unmakeAdmin'])->name('admin.unmakeadmin');
});

require __DIR__ . '/auth.php';
