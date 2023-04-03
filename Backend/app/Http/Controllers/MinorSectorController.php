<?php

namespace App\Http\Controllers;

use App\Models\MajorSector;
use App\Models\MinorSector;
use Illuminate\Http\Request;

class MinorSectorController extends Controller
{
    //

    public function show_minor_sector()
    {
        $sectors = MinorSector::with('majorsector')->get();   
            $pagename = 'MinorSectors';
            $data = [
                'sectors' => $sectors,
                'pagename' => $pagename
            ];
            return view('admin.minor-sector-list', $data);
        }

        public function add_minor_sector(Request $request)
        {
            $pagename = 'Add-MinorSectors';
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

        public function add_minor_sector_view()
        {
            $pagename = 'Add-MajorSectors';
            $sectors = MajorSector::all(); 
            return view('admin.add-minor-sector', compact('pagename', 'sectors'));
        }

}
