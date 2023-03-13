<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //
    public function show_form()
    {
        return view("idea.create-idea");
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'abstract' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'risk_rating' => ['required', 'string', 'max:255'],
            'expiry_date' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'instruments' => ['required', 'string', 'max:255'],
            'currency' => ['required', 'string', 'max:255'],
            'major_sector' => ['required', 'string', 'max:255'],
            'minor_sector' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'expiry_date' => ['required', 'string', 'max:255'],
        ]);

        $user = Idea::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'content' => $request->content,
            'risk_rating' => $request->risk_rating,
            'expiry_date' => $request->expiry_date,
            'category' => $request->category,
            'instruments' => $request->instruments,
            'currency' => $request->currency,
            'major_sector' => $request->major_sector,
            'minor_sector' => $request->minor_sector,
            'region' => $request->region,
            'country' => $request->country,
            'expiry_date' => $request->expiry_date,
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('ideator.ideas')->with('success', 'Idea created successfully!');
    }
}