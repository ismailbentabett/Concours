<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Concour;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    //
    // Show all categories
    public function indexCategories()
    {
        $categories = Category::paginate(10); // Adjust the pagination limit as per your preference
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
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the mime types and max size as per your requirement
        ]);
        // Create and save the category
        $category = new Category();
        $category->name = $request->input('name');
        $category->description =  $request->input('description');

        if ($request->hasFile('image')) {
            $avatar = $request->file('image');

            // Store the file in local storage
            $path = $avatar->store('categories', 'public');

            // Update the user's profile picture URL
            $category->image = $path;
        }



        $category->save();

        $toastr = [
            'type' => 'success',
            'title' => 'Category créé',
            'message' => 'Votre category a été créé avec succès'
        ];

        return redirect()->route('admin.categories.index')
            ->with(['toastr' => $toastr]);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        // Find the category and update it
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->description =  $request->input('description');

        if ($request->hasFile('image')) {
            $avatar = $request->file('image');

            // Store the file in local storage
            $path = $avatar->store('categories', 'public');

            // Update the user's profile picture URL
            $category->image = $path;
        }



        $category->save();
        $toastr = [
            'type' => 'success',
            'title' => 'Category Modifié',
            'message' => 'Votre category a été Modifié avec succès'
        ];

        return redirect()->route('admin.categories.index')
            ->with(['toastr' => $toastr]);
    }

    // Delete the category
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        // Find all Concours related to the category and delete them
        $concours = Concour::where('category_id', $category->id)->get();
        foreach ($concours as $concour) {
            $concour->delete();
        }

        // Delete the category itself
        $category->delete();

        $toastr = [
            'type' => 'success',
            'title' => 'Category Supprimé',
            'message' => 'Votre category a été Supprimé avec succès'
        ];

        return redirect()->route('admin.categories.index')
            ->with(['toastr' => $toastr]);
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
        $toastr = [
            'type' => 'success',
            'title' => 'Post Supprimé',
            'message' => 'Votre Post a été Supprimé avec succès'
        ];

        return redirect()->route('admin.posts.index')
            ->with(['toastr' => $toastr]);
    }
    public function listCandidates()
    {


        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'candidat');
        })->paginate(10);

        return view('admin.candidates.index', compact('users'));
    }

    // Delete a candidate
    public function deleteCandidate($id)
    {
        $candidate = User::findOrFail($id);
        $candidate->delete();

        //get all concours and posts by user id and delete them
        $concours = Concour::where('user_id', $id)->get();
        foreach ($concours as $concour) {
            $concour->delete();
        }

        $posts = Post::where('user_id', $id)->get();
        foreach ($posts as $post) {
            $post->delete();
        }


        $toastr = [
            'type' => 'success',
            'title' => 'Candidat Supprimé',
            'message' => 'Candidat a été Supprimé avec succès'
        ];



        return redirect()->route('admin.candidates.index')
            ->with(['toastr' => $toastr]);
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

        $toastr = [
            'type' => 'success',
            'title' => 'Utilisateur Modifié',
            'message' => 'Utilisateur a été Modifié avec succès'
        ];



        return redirect()->route('admin.users.index')
            ->with(['toastr' => $toastr]);
    }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $concours = Concour::where('user_id', $id)->get();
        foreach ($concours as $concour) {
            $concour->delete();
        }

        $posts = Post::where('user_id', $id)->get();
        foreach ($posts as $post) {
            $post->delete();
        }

        $toastr = [
            'type' => 'success',
            'title' => 'Utilisateur Supprimé',
            'message' => 'Utilisateur a été Supprimé avec succès'
        ];



        return redirect()->route('admin.users.index')
            ->with(['toastr' => $toastr]);
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


        $toastr = [
            'type' => 'success',
            'title' => 'Concour Modifié',
            'message' => 'Concour a été Modifié avec succès'
        ];



        return redirect()->route('admin.concours.index')
            ->with(['toastr' => $toastr]);
    }

    // Delete a concour
    public function destroyConcours($id)
    {
        $concour = Concour::findOrFail($id);
        $concour->delete();


        $toastr = [
            'type' => 'success',
            'title' => 'Concour Supprimé',
            'message' => 'Concour a été Supprimé avec succès'
        ];





        return redirect()->route('admin.concours.index')
            ->with(['toastr' => $toastr]);
    }

    //make admin
    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->attach(1);


        $toastr = [
            'type' => 'success',
            'title' => 'Utilisateur est maintenant Admin',
            'message' => 'Utilisateur est maintenant Admin'
        ];



        return redirect()->back()
            ->with(['toastr' => $toastr]);
    }


    //unmake admin
    public function unmakeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach(1);

        $toastr = [
            'type' => 'success',
            'title' => "Utilisateur n'est pas Admin",
            'message' => "Utilisateur n'est pas Admin"
        ];



        return redirect()->back()
            ->with(['toastr' => $toastr]);
    }
}
