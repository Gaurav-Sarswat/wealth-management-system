<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Category;
use App\Models\Countries;
use App\Models\Currency;
use App\Models\MajorSector;
use App\Models\MinorSector;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IdeaController extends Controller
{
    //
    public function show_form()
    {
        $categories = Category::all();
        $currencies = Currency::all();
        $major_sectors = MajorSector::all();
        $minor_sectors = MinorSector::with('majorsector')->get();
        $regions = Region::all();
        $countries = Countries::with('region')->get();
        $pagename = 'Create Idea';
        
        
        return view("idea.create-idea", compact('categories', 'currencies', 'major_sectors', 'minor_sectors', 'regions', 'countries', 'pagename'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'abstract' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'risk_rating' => ['required', 'string', 'max:255'],
            'expiry_date' => ['required', 'string', 'max:255'],
            'categories' => ['required'],
            'instruments' => ['required', 'string', 'max:255'],
            'currency' => ['required'],
            'major_sector' => ['required'],
            'minor_sector' => ['required'],
            'region' => ['required'],
            'country' => ['required'],
            'expiry_date' => ['required', 'string', 'max:255'],
            
        ]);

        $idea = Idea::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'content' => $request->content,
            'risk_rating' => $request->risk_rating,
            'expiry_date' => $request->expiry_date,
            'instruments' => $request->instruments,
            // 'currency' => $request->currency,
            // 'major_sector' => $request->major_sector,
            // 'minor_sector' => $request->minor_sector,
            // 'region' => $request->region,
            // 'country' => $request->country,
            'expiry_date' => $request->expiry_date,
            'status' => $request->status,
            'user_id' => Auth::id(),
            // 'image' => $imageUrl,
            // 'supporting_file' => $supportingFileurl
        ]);

        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $idea->image = Storage::url($path);
            $idea->save();
        }
        if($request->hasFile('supporting_file')){
            $path = $request->file('supporting_file')->store('public/files');
            $idea->supporting_file = Storage::url($path);
            $idea->save();
        }

        $idea->categories()->attach($request->categories);
        $idea->currencies()->attach($request->currency);
        $idea->majorsectors()->attach($request->major_sector);
        $idea->minorsectors()->attach($request->minor_sector);
        $idea->regions()->attach($request->region);
        $idea->countries()->attach($request->country);

        return redirect()->route('ideator.ideas')->with('success', 'Idea created successfully!');
    }
    public function update_idea_form($id)
    { 
        $idea = Idea::with('categories')->find($id); 
        if($idea->status == 'Published'){
            return redirect()->back()->with('error', 'You can\'t update a published idea');
        }
        $categories = Category::all();
        $currencies = Currency::all();
        $major_sectors = MajorSector::all();
        $minor_sectors = MinorSector::with('majorsector')->get();
        $regions = Region::all();
        $countries = Countries::with('region')->get();
        $pagename = 'Update Idea';

        return view('idea.update-idea', compact('idea', 'categories', 'currencies', 'major_sectors', 'minor_sectors', 'regions', 'countries', 'pagename'));
    }
    public function update_idea(Request $request, $id)
    { 
        $idea = Idea::find($id);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'abstract' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'risk_rating' => ['required', 'string', 'max:255'],
            'expiry_date' => ['required', 'string', 'max:255'],
            'categories' => ['required'],
            'instruments' => ['required', 'string', 'max:255'],
            'currency' => ['required'],
            'major_sector' => ['required'],
            'minor_sector' => ['required'],
            'region' => ['required'],
            'country' => ['required'],
            'expiry_date' => ['required', 'string', 'max:255'],
        ]);

        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $idea->image = Storage::url($path);
        }
        if($request->hasFile('supporting_file')){
            $path = $request->file('supporting_file')->store('public/files');
            $idea->supporting_file = Storage::url($path);
        }

        $idea->title = $request->title;
        $idea->abstract = $request->abstract;
        $idea->content = $request->content;
        $idea->risk_rating = $request->risk_rating;
        $idea->expiry_date = $request->expiry_date;
        $idea->instruments = $request->instruments;
        $idea->expiry_date = $request->expiry_date;
        $idea->status = $request->status;

        $idea->categories()->sync($request->categories);
        $idea->currencies()->sync($request->currency);
        $idea->majorsectors()->sync($request->major_sector);
        $idea->minorsectors()->sync($request->minor_sector);
        $idea->regions()->sync($request->region);
        $idea->countries()->sync($request->country);

        $idea->save();

        return redirect()->route('ideator.ideas')->with('success', 'Idea updated successfully!');
    }
    public function view($id)
    { 
        $idea = Idea::with('categories', 'currencies', 'majorsectors', 'minorsectors', 'regions', 'countries')->find($id);
        $pagename = $idea->title;


        return view('idea.view-idea', compact('idea', 'pagename'));
    }
}
