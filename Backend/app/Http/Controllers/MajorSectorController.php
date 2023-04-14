<?php

namespace App\Http\Controllers;

use App\Models\MajorSector;
use Illuminate\Http\Request;

class MajorSectorController extends Controller
{
    //

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

        public function add_major_sector_view()
        {
            $pagename = 'Add Major Sector';
            return view('admin.add-major-sector', compact('pagename'));
        }

}
