<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Concour;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            // Upload the file to Cloudinary
            $result = Cloudinary::upload($request->file('image')->getRealPath());

            $concour->image = $result->getSecurePath();



            // Update the user's profile picture URL
        }

        $concour->save();
        $user = User::find(auth()->user()->id);
        $user->role = 'condidate';
        $user->save();


        return redirect()->route('user.concours')->with('success', 'Concour created successfully.');
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
