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
            $avatar = $request->file('avatar');

            // Store the file in local storage
            $path = $avatar->store('avatars', 'public');

            // Update the user's profile picture URL
            $user->avatar = $path;
            $user->save();
        }

        return redirect()->back();
    }



    public function profiles(Request $request)
    {
        $category = $request->input('tabs') ?? 'all';

        $cat = Category::where('name', $category)->first() ?? null;

        $concours = $cat ? Concour::where('category_id', $cat->id)->paginate(10) : Concour::paginate(10);

        $categories = Category::all();

        foreach ($concours as $concour) {
            $concour->user = User::find($concour->user_id);
        }

        return view('concurrentes.index', compact('concours', 'categories'));
    }


}
