<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('dashboard')->with('pagename', 'Dashboard');
    }

    public function list()
    { 
        $ideas = Idea::all(); 
        return view('admin.admin-idea-list')->with('ideas', $ideas);
    }

    public function view($id)
    { 
        $idea = Idea::find($id); 

        $data = [
            'idea' => $idea,
            'pagename' => $idea->title
        ];
        return view('admin.admin-view-idea', $data);
    }
}
