<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IdeatorController extends Controller
{
    //
    public function index()
    {
        return view('idea.dashboard')->with('pagename', 'Dashboard');
    }
    public function user_profile_view()
    {
        return view('idea.edit-profile');
    }
    public function update_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $picture = $user->profile_picture;
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        if($request->hasFile('profile_picture')){
            $path = $request->file('profile_picture')->store('public/uploads');
            $url = Storage::url($path);
            $user->profile_picture = $url;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
