<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\Region;


class CountriesController extends Controller
{
    /**
     * Show all countries.
     *
     */
    function show_countries ()
    {
        $countries = Countries::with('region')->get();
        $pagename = 'All Countries';
        return view('admin.countries-list', compact('countries', 'pagename'));
    }
    /**
     * Show add country form.
     *
     */
    function add_countries_view ()
    {
        $regions = Region::all();
        $pagename = 'Add A Country';
        return view('admin.countries-add', compact('pagename', 'regions'));
    }
    /**
     * Add a country.
     *
     * @param  \Illuminate\Http\Request $request
     */
    function add_country (Request $request)
    {
        // return dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'region' => ['required']
        ]);

        $country = Countries::create([
            'name' => $request->name,
            'region_id' => $request->region
        ]);

        return redirect()->route('admin.show-countries')->with('success', 'Country added successfully!');
    }
}
