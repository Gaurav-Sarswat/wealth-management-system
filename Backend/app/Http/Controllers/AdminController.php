<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $ideas = Idea::whereHas('categories', function ($query) use ($filter_category) {
            $query->where('categories.id', $filter_category);
        })->get();
       
        $data = [
            'ideas' => $ideas,
            'categories' => $categories,
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
}
