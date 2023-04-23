<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;


class IdeatorController extends Controller
{
    /**
     * Show all their ideas to ideator.
     *
     */
    public function index()
    {
        $draft_ideas = Idea::where('status', 'Draft')->count();
        $published_ideas = Idea::where('status', 'Published')->count();
        $ideaLabels = ['Draft', 'Published'];
        $ideaValues = [$draft_ideas, $published_ideas];
        $pagename = 'Dashboard';
        return view('idea.dashboard', compact('ideaValues', 'ideaLabels', 'pagename'));
    }
    /**
     * Show list of ideas.
     *
     */
    public function list()
    {
        $ideas = Idea::with('categories')->latest()->where('user_id', Auth::id())->paginate(9);
        return view('idea.idea-list')->with('ideas', $ideas);
    }
    /**
     * View user profile form.
     *
     */
    public function user_profile_view()
    {
        return view('idea.edit-profile');
    }
    /**
     * Update user profile.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function update_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $picture = $user->profile_picture;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('public/uploads');
            $url = Storage::url($path);
            $user->profile_picture = $url;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    /**
     * Show change password form.
     *
     */
    public function change_password_view()
    {
        return view('idea.change-password');
    }
    /**
     * Change password.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect old password, please try again!');
        }

        $user = User::find(Auth::user()->id);

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Password changed successfully, please login again');
    }
}
