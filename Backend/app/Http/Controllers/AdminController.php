<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('dashboard')->with('pagename', 'Dashboard');
    }

    public function list(Request $request)
    {
        
        $ideas = Idea::all(); 
        $categories = Category::all();
        $filter_category = $request->query('category');
        if($filter_category!=''){
            $ideas = Idea::whereHas('categories', function ($query) use ($filter_category) {
                $query->where('categories.id', $filter_category);
            })->get();
        }
        $data = [
            'ideas' => $ideas,
            'categories' => $categories,
            'selected_category' => $filter_category
        ];

        return view('admin.admin-idea-list', $data);
    }

    public function view($id)
    { 
        $idea = Idea::find($id); 
        
        $data = [
            'idea' => $idea,
            'pagename' => $idea->title,
            
        ];
        return view('admin.admin-view-idea', $data);
    }

    public function show_profile()
    { 
        return view('admin.edit-profile');
    }

    public function update_profile(Request $request)
    { 
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
