<?php

namespace App\Http\Controllers;

use App\Models\Concour;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //like post

    public function likePost($id)
    {
        $post = Post::find($id);
        $post->like();
        $post->save();

        return redirect()->back()->with('message', 'Post Liked successfully!');
    }

    public function unlikePost($id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();

        return redirect()->back()->with('message', 'Post Like undo successfully!');
    }

    //like concours

    public function likeConcour($id)
    {
        $concour = Concour::find($id);
        $concour->like();
        $concour->save();

        return redirect()->back()->with('message', 'Concour Liked successfully!');
    }

    public function unlikeConcour($id)
    {
        $concour = Concour::find($id);
        $concour->unlike();
        $concour->save();

        return redirect()->back()->with('message', 'Concour Like undo successfully!');
    }

    //like user

    public function likeUser($id)
    {
        $user = User::find($id);
        $user->like();
        $user->save();

        return redirect()->back()->with('message', 'User Liked successfully!');
    }

    public function unlikeUser($id)
    {
        $user = User::find($id);
        $user->unlike();
        $user->save();

        return redirect()->back()->with('message', 'User Like undo successfully!');
    }
}
