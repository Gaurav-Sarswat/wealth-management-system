<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Idea;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    //
    public function index()
    {
        return view('dashboard')->with('pagename', 'Dashboard');
    }
    public function set_preferences_view()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories,
            'pagename' => 'Set Preferences'
        ];

        return view('client.set-preferences', $data);
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
}
