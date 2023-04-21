<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{

    /**
     * Show the Dashboard.
     *
     * @return \Illuminate\View\View
     */
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
        
        
        return view('admin.dashboard', compact('users', 'clients', 'relationship_manager', 'ideators', 'ideas', 'published_ideas', 'draft_ideas', 'accepted_ideas', 'rejected_ideas', 'pending_ideas', 'label_user', 'data_user', 'label_status', 'data_status', 'label_verification_status', 'data_verification_status', 'pagename'));
    }

    /**
     * Show the list of ideas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function list(Request $request)
    {
        
        $categories = Category::all();
        $filter_category = $request->query('category');
        if($filter_category != ''){
            $ideas = Idea::whereIn('status', ['Published', 'Draft'])->whereIn('verification_status', ['accepted', 'pending', 'rejected'])->
            whereHas('categories', 
            function ($query) use ($filter_category) {
                $query->where('categories.id', $filter_category);
            })->paginate(9);
        } else {
            $ideas = Idea::whereIn('status', ['Published', 'Draft'])->whereIn('verification_status', ['accepted', 'pending', 'rejected'])->paginate(9);
        }

        $data = [
            'ideas' => $ideas,
            'categories' => $categories,
            'selected_category' => $filter_category
        ];
        return view('admin.admin-idea-list', $data);
    }

    /**
     * Show the details of an idea.
     *
     * @param  App\Models\Idea $id
     * @return \Illuminate\View\View  $data
     */
    public function view($id)
    { 
        $idea = Idea::find($id); 
        
        $data = [
            'idea' => $idea,
            'pagename' => $idea->title,
            
        ];
        return view('admin.admin-view-idea', $data);
    }

    /**
     * Accept an idea.
     *
     * @param  \App\Models\Idea $id
     * @param  \Illuminate\Http\Request  $request
     */
    public function accept($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->verification_status = 'accepted';
        $idea->save();
        return redirect()->route("admin.ideas")->with('success', 'Idea accepted successfully!');
    }

    /**
     * Reject an idea.
     *
     * @param  \App\Models\Idea $id
     * @param  \Illuminate\Http\Request  $request
     */
    public function reject($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->verification_status = 'rejected';
        $idea->save();
        return redirect()->route("admin.ideas")->with('success', 'Idea rejected successfully!');
    }

    /**
     * Delete an idea.
     *
     * @param  \App\Models\Idea $id
     * @param  \Illuminate\Http\Request  $request
     */
    public function delete_idea($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->delete();
        return redirect()->route("admin.ideas")->with('success', 'Idea Deleted successfully!');
    }

    /**
     * View profile settings page.
     *
     * @return \Illuminate\View\View
     */
    public function user_profile_view()
    {
        return view('admin.edit-profile');
    }

    /**
     * Update profile.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $picture = $user->profile_picture;
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        if($request->hasFile('profile_picture')){
            $path = $request->file('profile_picture')->store('public/uploads');
            $url = Storage::url($path);
            $user->profile_picture = $url;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * View Change password window.
     *
     * @return \Illuminate\View\View
     */
    public function change_password_view()
    {
        return view('admin.change-password');
    }

    /**
     * Method to Change password.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if(!Hash::check($request->current_password, Auth::user()->password)){
            return redirect()->back()->with('error', 'Incorrect old password, please try again!');
        }
        
        $user = User::find(Auth::user()->id);
        
        $user->password = Hash::make($request->password);
        $user->save();
        
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Password changed successfully, please login again');

    }
}
