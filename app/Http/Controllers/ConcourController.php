<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Concour;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConcourController extends Controller
{

    public function submit(Request $request)
    {
        // Process the data and submit it

        $concour = new Concour();
        $concour->category_id = $request->input('category_id');
        $concour->profession = $request->input('profession');
        $concour->user_id = auth()->user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Store the file in local storage
            $path = $image->store('concours', 'public');

            $concour->image = $path;
        }

        $concour->save();

        $user = User::find(auth()->user()->id);
        $user->role = 'condidate';
        $user->save();

        return redirect()->route('user.concours')->with('success', 'Concour created successfully.');
    }


    public function destroy(Concour $concour)
    {

        $concour->delete();

        return redirect()->route('user.concours')->with('success', 'Concour deleted successfully.');

    }


    public function concours(Request $request)
    {
        $currentUser = Auth::user();

        $category = $request->input('tabs') ?? 'all';

        $cat = Category::where('name', $category)->first() ?? null;

        $concours = $cat
            ? Concour::where('category_id', $cat->id)->where('user_id', $currentUser->id)->paginate(10)
            : Concour::where('user_id', $currentUser->id)->paginate(10);

        $categories = Category::all();


        return view('user.concours', compact('concours', 'categories', 'currentUser'));
    }
    public function getUserConcours(Request $request)
    {

        $authuser = Auth::user();
        if (
            $request->id == $authuser->id
        ) {
            return redirect('/user/concours');
        }
        $user = User::find($request->id);

        $category = $request->input('tabs') ?? 'all';

        $cat = Category::where('name', $category)->first() ?? null;

        $concours = $cat
            ? Concour::where('category_id', $cat->id)->where('user_id', $user->id)->paginate(10)
            : Concour::where('user_id', $user->id)->paginate(10);

        $categories = Category::all();


        return view('visituser.concours', compact('concours', 'categories', 'user'));
    }
}
