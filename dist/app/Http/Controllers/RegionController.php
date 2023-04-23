<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;


class RegionController extends Controller
{
    /**
     * Show all regions from the database.
     *
     */
    function show_regions ()
    {
        $regions = Region::all();
        $pagename = 'All Regions';
        return view('admin.region-list', compact('regions', 'pagename'));
    }
    /**
     * Show add region form.
     *
     */
    function add_regions_view ()
    {
        $pagename = 'Add A Region';
        return view('admin.region-add', compact('pagename'));
    }
    /**
     * Add region.
     *
     * @param  \Illuminate\Http\Request $request
     */
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
