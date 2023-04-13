<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Idea;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class ClientController extends Controller
{
    //
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::with('portfolio')->take(10)->with('manager')->find(Auth::user()->id);
        $pagename = 'Dashboard';
        return view('client.dashboard', compact('pagename', 'user'));
    }
    public function set_preferences_view()
    {
        $categories = Category::all();
        $user = User::with('categories')->find(Auth::user()->id);
        $user_categories = $user->categories;
        $pagename = 'Set Preferences';


        return view('client.set-preferences', compact('categories', 'pagename', 'user_categories'));
    }
    public function set_preferences(Request $request)
    {

        $user = User::find($request->user()->id);
        $preferences = $request->preferences;

        $user->categories()->sync($preferences);

        return redirect()->route('client.dashboard')->with('success', 'Preferences Set Successfully!');
    }
    public function suggested_ideas()
    {
        $user = Auth::user();
        $ideas = Idea::whereHas('categories', function($query) use ($user) {
            $query->whereIn('categories.id', $user->categories()->pluck('categories.id')->toArray());
        })->where('status', 'Published')->get();
        
        return view('client.suggested-ideas', compact('ideas'));
    }
    public function view($id)
    { 
        $idea = Idea::with('user', 'categories', 'currencies', 'majorsectors', 'minorsectors', 'regions', 'countries')->find($id);
        $user = User::with('portfolio', 'wishlist')->find(Auth::user()->id);
        $portfolio = $user->portfolio;
        $wishlist = $user->wishlist;
        $pagename = $idea->title;
 
        return view('client.view-idea', compact('idea', 'pagename', 'portfolio', 'wishlist'));
    }
    public function add_to_portfolio($id)
    {
        $user = Auth::user();
        $user->wishlist()->detach($id);
        $user->portfolio()->attach($id);
 
 
        return redirect()->back()->with('success', 'Congratulations, Added to portfolio successfully!');
    }
    public function portfolio()
    {
        $user = User::with('portfolio')->find(Auth::user()->id);
        $ideas = $user->portfolio;
        $pagename = 'My Portfolio';
 
        return view('client.portfolio', compact('ideas', 'pagename'));
    }
    public function add_to_wishlist($id)
    {
        $user = Auth::user();
        $user->wishlist()->attach($id);
 
 
        return redirect()->back()->with('success', 'Congratulations, Added to wishlist successfully!');
    }
    public function wishlist()
    {
        $user = User::with('wishlist')->find(Auth::user()->id);
        $ideas = $user->wishlist;
        $pagename = 'My Wishlist';
 
        return view('client.portfolio', compact('ideas', 'pagename'));
    }
    public function user_profile_view()
    {
        $categories = Category::all();
        $user = User::with('categories')->find(Auth::user()->id);
        $user_categories = $user->categories;
        return view('client.edit-profile', compact('categories', 'user_categories'));
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
        $user->categories()->sync($request->preferences);
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
