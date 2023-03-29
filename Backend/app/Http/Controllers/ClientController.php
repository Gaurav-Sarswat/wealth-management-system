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

        $user->categories()->attach($preferences);


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
        $idea = Idea::with(['categories', 'users'])->find($id);
        $pagename = $idea->title;
 
        return view('client.view-idea', compact('idea', 'pagename'));
    }
}
