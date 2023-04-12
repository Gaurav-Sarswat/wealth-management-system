<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Category;
use App\Models\RelationshipManager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::count();
        $clients = User::where('role', 'client')->count();
        $relationship_manager = User::where('role', 'rm')->count();
        $ideators = User::where('role', 'ideator')->count();
        $pagename = 'Dashboard';
        $label_user = ['Clients', 'Relationship Manager', 'Ideator'];
        $data_user = [$clients, $relationship_manager, $ideators];
        $ideas = Idea::count();
        $published_ideas = Idea::where('status', 'Published')->count();
        $draft_ideas = Idea::where('status', 'Draft')->count();
        $label_status = ['Published', 'Draft'];
        $data_status = [$published_ideas, $draft_ideas];
        $accepted_ideas = Idea::where('verification_status', 'accepted')->count();
        $rejected_ideas = Idea::where('verification_status', 'rejected')->count();
        $pending_ideas = Idea::where('verification_status', 'pending')->count();
        $label_verification_status = ['Accepted Ideas', 'Rejected Ideas', 'Pending Ideas'];
        $data_verification_status = [$accepted_ideas, $rejected_ideas, $pending_ideas];
        
        
        return view('admin.dashboard', compact('users', 'clients', 'relationship_manager', 'ideators', 'ideas', 'published_ideas', 'draft_ideas', 'accepted_ideas', 'rejected_ideas', 'pending_ideas', 'label_user', 'data_user', 'label_status', 'data_status', 'label_verification_status', 'data_verification_status'));
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
