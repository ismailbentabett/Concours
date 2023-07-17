<?php

namespace App\Http\Controllers;

use App\Models\Post;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
                $uploadResult = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'posts',
                ]);

                $imageUrl = Arr::get($uploadResult->getSecurePath(), 'url');

                $post->images()->create(['url' => $imageUrl]);
            }
        }

        return redirect()->route('user.concours')->with('success', 'Post created successfully.');
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

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
