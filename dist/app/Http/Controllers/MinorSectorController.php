<?php

namespace App\Http\Controllers;

use App\Models\MajorSector;
use App\Models\MinorSector;
use Illuminate\Http\Request;

class MinorSectorController extends Controller
{
    /**
     * Show all minor sectors from the database.
     *
     * @param  \App\Models\Idea $id
     * @param  \Illuminate\Http\Request $request
     */
    public function show_minor_sector()
    {
        $sectors = MinorSector::with('majorsector')->get();
        $pagename = 'Minor Sectors';
        $data = [
            'sectors' => $sectors,
            'pagename' => $pagename
        ];
        return view('admin.minor-sector-list', $data);
    }
    /**
     * Add a minor sector.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function add_minor_sector(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'majorsector' => ['required'],
        ]);

        $sector = MinorSector::create([
            'name' => $request->name,
            'major_sectors_id' => $request->majorsector
        ]);


        return redirect()->route('admin.show_minor_sector')->with('success', 'Minor Sector created successfully!');
    }
    /**
     * Show add minor sector form.
     *
     */
    public function add_minor_sector_view()
    {
        $pagename = 'Add Minor Sector';
        $sectors = MajorSector::all();
        return view('admin.add-minor-sector', compact('pagename', 'sectors'));
    }
}
