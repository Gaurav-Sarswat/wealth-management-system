<?php

namespace App\Http\Controllers;

use App\Models\MajorSector;
use Illuminate\Http\Request;

class MajorSectorController extends Controller
{
    /**
     * Show all major sectors from the database.
     *
     */
    public function show_major_sector()
    {
        $sectors = MajorSector::all();
        $pagename = 'Major Sectors';
        $data = [
            'sectors' => $sectors,
            'pagename' => $pagename
        ];
        return view('admin.major-sector-list', $data);
    }
    /**
     * Add a major sector.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function add_major_sector(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $sector = MajorSector::create([
            'name' => $request->name,
        ]);


        return redirect()->route('admin.show_major_sector')->with('success', 'Major Sector created successfully!');
    }
    /**
     * Show major sector form.
     *
     */
    public function add_major_sector_view()
    {
        $pagename = 'Add Major Sector';
        return view('admin.add-major-sector', compact('pagename'));
    }
}
