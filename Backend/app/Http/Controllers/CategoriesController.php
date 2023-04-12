<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function show_categories()
    {
        $categories = Category::all();   
            $pagename = 'categories';
            $data = [
                'categories' => $categories,
                'pagename' => $pagename
            ];
            return view('admin.currency-list', $data);
        }

        public function add_categories(Request $request)
        {
            $pagename = 'Add-categories';
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
    
            $currency = Category::create([
                'name' => $request->name,
            ]);
    
            
            return redirect()->route('admin.show_categories')->with('success', 'Category created successfully!');
        }

        public function add_categories_view()
        {
            $pagename = 'Add-categories';
            return view('admin.add-category', compact('pagename'));
        }
}
