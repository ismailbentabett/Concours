<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Concour;
use App\Models\Post;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    // Show all categories
    public function indexCategories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function createCategory()
    {
        return view('admin.categories.create');
    }

    // Store the newly created category
    public function storeCategory(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|unique:categories,name|max:255',
        ]);

        // Create and save the category
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    // Show the form to edit an existing category
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Update the category with the provided data
    public function updateCategory(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $id . '|max:255',
        ]);

        // Find the category and update it
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // Delete the category
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    public function indexPosts()
    {
        $posts = Post::paginate(10); // Adjust the pagination limit as per your preference
        return view('admin.posts.index', compact('posts'));
    }

    // Delete a post
    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }
    public function listCandidates()
    {
        $candidates = User::whereHas('roles', function ($query) {
            $query->where('name', 'candidate');
        })->paginate(10); // Adjust the pagination limit as per your preference

        return view('admin.candidates.index', compact('candidates'));
    }

    // Delete a candidate
    public function deleteCandidate($id)
    {
        $candidate = User::findOrFail($id);
        $candidate->delete();

        return redirect()->route('admin.candidates.index')
            ->with('success', 'Candidate deleted successfully.');
    }

    public function indexUsers()
    {
        $users = User::paginate(10); // Adjust the pagination limit as per your preference
        return view('admin.users.index', compact('users'));
    }

    // Show the form to edit an existing user
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Update the user with the provided data
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules for user fields if needed
        ]);

        // Update the user
        $user->name = $request->input('name');
        // Update other user fields if needed
        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    public function indexConcours()
    {
        $concours = Concour::paginate(10); // Adjust the pagination limit as per your preference
        return view('admin.concours.index', compact('concours'));
    }



    // Show the form to edit an existing concour
    public function editConcours($id)
    {
        $concour = Concour::findOrFail($id);
        return view('admin.concours.edit', compact('concour'));
    }

    // Update the concour with the provided data
    public function updateConcours(Request $request, $id)
    {
        $concour = Concour::findOrFail($id);
        $concour->update($request->all());

        return redirect()->route('admin.concours.index')
            ->with('success', 'Concour updated successfully.');
    }

    // Delete a concour
    public function destroyConcours($id)
    {
        $concour = Concour::findOrFail($id);
        $concour->delete();

        return redirect()->route('admin.concours.index')
            ->with('success', 'Concour deleted successfully.');
    }
}
