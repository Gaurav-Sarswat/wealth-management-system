<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;



class RelationshipManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $pagename = 'Dashboard';
        $id = Auth::user()->id;
        $clients = User::where('manager_id', $id)->count();
        $ideas = Idea::where('status', 'Published')->whereIn('verification_status', ['accepted', 'pending'])->count();
        $accepted_ideas = Idea::where('status', 'Published')->where('verification_status', 'accepted')->count();
        $pending_ideas = Idea::where('status', 'Published')->where('verification_status', 'pending')->count();
        return view('relationship-manager.dashboard', compact('pagename', 'clients', 'ideas', 'accepted_ideas', 'pending_ideas'));
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);      

        $credentials = $request->only('email', 'password');
        // return dd($request);
        Auth::guard('rm')->attempt($credentials);

        return redirect()->route('relationship-manager.dashboard');
    }

    public function list(Request $request)
    { 
        $categories = Category::all();
        $filter_category = $request->query('category');
        if($filter_category != ''){
            $ideas = Idea::where('status', 'Published')->whereIn('verification_status', ['accepted', 'pending'])->
            whereHas('categories', 
            function ($query) use ($filter_category) {
                $query->where('categories.id', $filter_category);
            })->paginate(10);
        } else {
            $ideas = Idea::where('status', 'Published')->whereIn('verification_status', ['accepted', 'pending'])->paginate(10);
        }

        $data = [
            'ideas' => $ideas,
            'categories' => $categories,
            'selected_category' => $filter_category
        ];

        return view('relationship-manager.rm-idea-list', $data);
    }

    public function view($id)
    { 
        $idea = Idea::find($id); 

        $data = [
            'idea' => $idea,
            'pagename' => $idea->title
        ];
        return view('relationship-manager.rm-view-idea', $data);
    }

    public function accept($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->verification_status = 'accepted';
        $idea->save();
        return redirect()->route("relationship-manager.ideas")->with('success', 'Idea accepted successfully!');
    }

    public function reject($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->verification_status = 'rejected';
        $idea->save();
        return redirect()->route("relationship-manager.ideas")->with('success', 'Idea rejected successfully!');
    }

    public function user_profile_view()
    {
        return view('relationship-manager.edit-profile');
    }
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
    public function change_password_view()
    {
        return view('relationship-manager.change-password');
    }
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
