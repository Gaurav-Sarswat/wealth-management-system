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
        
        $categories = Category::all();
        $filter_category = $request->query('category');
        if($filter_category != ''){
            $ideas = Idea::whereIn('status', ['Published', 'Draft'])->whereIn('verification_status', ['accepted', 'pending', 'rejected'])->
            whereHas('categories', 
            function ($query) use ($filter_category) {
                $query->where('categories.id', $filter_category);
            })->get();
        } else {
            $ideas = Idea::whereIn('status', ['Published', 'Draft'])->whereIn('verification_status', ['accepted', 'pending', 'rejected'])->get();
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

    public function accept($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->verification_status = 'accepted';
        $idea->save();
        return redirect()->route("admin.ideas")->with('success', 'Idea accepted successfully!');
    }

    public function reject($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->verification_status = 'rejected';
        $idea->save();
        return redirect()->route("admin.ideas")->with('success', 'Idea rejected successfully!');
    }

    public function delete_idea($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->delete();
        return redirect()->route("admin.ideas")->with('success', 'Idea Deleted successfully!');
    }
}
