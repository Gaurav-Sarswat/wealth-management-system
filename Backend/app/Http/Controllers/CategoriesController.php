<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display all Categories.
     */
    public function show_categories()
    {
        $categories = Category::all();
        $pagename = 'Categories';
        $data = [
            'categories' => $categories,
            'pagename' => $pagename
        ];
        return view('admin.category-list', $data);
    }

    /**
     * Add a category into the database.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function add_categories(Request $request)
    {
        $pagename = 'Add-categories';
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $category = Category::create([
            'title' => $request->title,
        ]);


        return redirect()->route('admin.show_categories')->with('success', 'Category created successfully!');
    }

    /**
     * Show add category form.
     */
    public function add_categories_view()
    {
        $pagename = 'Add-categories';
        return view('admin.add-category', compact('pagename'));
    }
}
