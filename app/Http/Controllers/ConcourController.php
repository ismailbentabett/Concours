<?php

namespace App\Http\Controllers;

use App\Models\Concour;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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


        return redirect()->route('user.index')->with('success', 'Concour created successfully.');
    }
}
