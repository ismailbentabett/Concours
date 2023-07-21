<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Create method for displaying the create post form
    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store the image in local storage
                $path = $image->store('posts', 'public');

                $imageModel = new Image();
                $imageModel->url = $path;
                $imageModel->post_id = $post->id;
                $imageModel->save();
            }
        }

        return redirect()->route('user.posts')->with('success', 'Post created successfully.');
    }



    // Show method for displaying a specific post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Edit method for displaying the edit post form
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Update method for updating a post in the database
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Destroy method for deleting a post
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('user.posts')->with('success', 'Post deleted successfully.');
    }



    //get user posts
    public function userPosts()
    {
        $user = User::find(Auth::user()->id);
        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        //add images to each post
        foreach ($posts as $post) {
            $images = Image::where('post_id', $post->id)->get();
            $post->images = $images;
        }

        return view('user.posts', compact('posts', 'user'));
    }
    public function getUserPosts(Request $request)
    {

        $authuser = Auth::user();
        if (
            $request->id == $authuser->id
        ) {
            return redirect('/user/concours');
        }

        $user = User::find($request->id);
        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        //add images to each post
        foreach ($posts as $post) {
            $images = Image::where('post_id', $post->id)->get();
            $post->images = $images;
        }

        return view('visituser.posts', compact('posts', 'user'));
    }
}
