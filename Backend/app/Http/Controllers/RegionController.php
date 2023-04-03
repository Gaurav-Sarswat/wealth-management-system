<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;


class RegionController extends Controller
{
    //
    function show_regions ()
    {
        $regions = Region::all();
        $pagename = 'All Regions';
        return view('admin.region-list', compact('regions', 'pagename'));
    }
    function add_regions_view ()
    {
        $pagename = 'Add A Region';
        return view('admin.region-add', compact('pagename'));
    }
    function add_region (Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $region = Region::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.show-regions')->with('success', 'Region added successfully!');
    }
}
