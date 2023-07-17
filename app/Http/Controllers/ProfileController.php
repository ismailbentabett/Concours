<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use App\Models\Concour;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function upload(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            // Upload the file to Cloudinary
            $result = Cloudinary::upload($request->file('avatar')->getRealPath());

            // Update the user's profile picture URL
            $user->avatar = $result->getSecurePath();
            $user->save();
        }

        return redirect()->back();

    }


    public function profiles(Request $request)
    {

        // Retrieve the selected category from the request
        $category = $request->input('category');

        // Query the user's posts with category filtering
        $concours = Concour::all();

        if ($category) {
            if ($category === 'all') {

                $concours = $concours->paginate (5);
                // Do nothing, retrieve all posts
            } else {


                $concours->whereHas('category', function ($query) use ($category) {
                    $query->where('name', $category);
                });
                $concours = $concours->paginate (5);

            }
        }


        $categories = Category::all();


        return view('concurrentes.index' , compact('categories', 'concours'));    }



}
