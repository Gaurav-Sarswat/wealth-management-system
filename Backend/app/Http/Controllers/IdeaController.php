<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IdeaController extends Controller
{
    //
    public function show_form()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories,
            'pagename' => 'Create Idea'
        ];

        return view("idea.create-idea", $data);
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'abstract' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'risk_rating' => ['required', 'string', 'max:255'],
            'expiry_date' => ['required', 'string', 'max:255'],
            'categories' => ['required'],
            'instruments' => ['required', 'string', 'max:255'],
            'currency' => ['required', 'string', 'max:255'],
            'major_sector' => ['required', 'string', 'max:255'],
            'minor_sector' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'expiry_date' => ['required', 'string', 'max:255'],
        ]);

        $idea = Idea::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'content' => $request->content,
            'risk_rating' => $request->risk_rating,
            'expiry_date' => $request->expiry_date,
            'instruments' => $request->instruments,
            'currency' => $request->currency,
            'major_sector' => $request->major_sector,
            'minor_sector' => $request->minor_sector,
            'region' => $request->region,
            'country' => $request->country,
            'expiry_date' => $request->expiry_date,
            'status' => $request->status,
            'user_id' => Auth::id(),
        ]);

        $idea->categories()->attach($request->categories);

        return redirect()->route('ideator.ideas')->with('success', 'Idea created successfully!');
    }
    public function list()
    { 
        $ideas = Idea::where('user_id', Auth::id())->get(); 
        return view('idea.idea-list')->with('ideas', $ideas);
    }
    public function update_idea_form($id)
    { 
        $idea = Idea::with('categories')->find($id); 
        $categories = Category::all();

        $data = [
            'idea' => $idea,
            'categories' => $categories,
            'pagename' => 'Update Idea'
        ];

        return view('idea.update-idea', $data);
    }
    public function update_idea($id)
    { 
        $idea = Idea::find($id);

        $data = [
            'idea' => $idea,
            'pagename' => 'Update Idea'
        ];

        return view('idea.update-idea', $data);
    }
    public function view($id)
    { 
        $idea = Idea::with('categories')->find($id);
        $pagename = $idea->title;


        return view('idea.view-idea', compact('idea', 'pagename'));
    }
}
