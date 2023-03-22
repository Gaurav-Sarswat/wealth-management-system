<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;


class ClientController extends Controller
{
    //
    public function index()
    {
        return view('dashboard')->with('pagename', 'Dashboard');
    }
    public function setPreferencesView()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories,
            'pagename' => 'Set Preferences'
        ];

        return view('client.set-preferences', $data);
    }
    public function setPreferences(Request $request)
    {

        $user = User::find($request->user()->id);
        $preferences = $request->preferences;

        $user->categories()->attach($preferences);


        return redirect()->route('client.dashboard')->with('success', 'Preferences Set Successfully!');
    }
}
