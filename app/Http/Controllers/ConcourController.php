<?php

namespace App\Http\Controllers;

use App\Models\Concour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConcourController extends Controller
{
    public function submit(Request $request)
    {


        $this->validate($request, [
            'category_id' => 'required',
            'user_id' => 'required',
        ]);

        // Process the data and submit it

        $concour = new Concour();
        $concour->category_id = $request->input('category_id');
        $concour->profession = $request->input('profession');
        $concour->user_id = auth()->user()->id;
        $concour->save();


        return redirect()->route('user.index')->with('success', 'Concour created successfully.');    }
}
