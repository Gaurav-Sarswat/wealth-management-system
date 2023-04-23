<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Idea;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class ClientController extends Controller
{
    /**
     * Show client dashboard.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::with('portfolio')->take(10)->with('manager')->find(Auth::user()->id);
        $pagename = 'Dashboard';
        return view('client.dashboard', compact('pagename', 'user'));
    }
    /**
     * Show user all categories to set their preferenes.
     */
    public function set_preferences_view()
    {
        $categories = Category::all();
        $user = User::with('categories')->find(Auth::user()->id);
        $user_categories = $user->categories;
        $pagename = 'Set Preferences';


        return view('client.set-preferences', compact('categories', 'pagename', 'user_categories'));
    }
    /**
     * Set user preferences.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function set_preferences(Request $request)
    {

        $user = User::find($request->user()->id);
        $preferences = $request->preferences;

        $user->categories()->sync($preferences);

        return redirect()->route('client.dashboard')->with('success', 'Preferences Set Successfully!');
    }
    /**
     * Show users suggested ideas based on their set preferences
     * and do not fetch ideas already in user's portfolio.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function suggested_ideas(Request $request)
    {
        $categories = Category::all();
        $selected_category = $request->query('category');
        $risk = $request->query('risk');
        $user = Auth::user();
        $id = $user->id;
        if ($selected_category) {
            $pagename = "All Ideas based on selected filter";
            $ideas = Idea::whereHas('categories', function ($query) use ($selected_category) {
                $query->where('categories.id', $selected_category);
            })->whereDoesntHave('userportfolio', function ($query) use ($id) {
                $query->where('user_id', $id);
            })->when($risk, function ($query, $risk) {
                return $query->where('risk_rating', $risk);
            })->where('status', 'Published')->where('verification_status', 'accepted')->paginate(9);
        } else {
            $pagename = "Idea suggestions based on your preferences";
            $ideas = Idea::whereHas('categories', function ($query) use ($user) {
                $query->whereIn('categories.id', $user->categories()->pluck('categories.id')->toArray());
            })->whereDoesntHave('userportfolio', function ($query) use ($id) {
                $query->where('user_id', $id);
            })->when($risk, function ($query, $risk) {
                return $query->where('risk_rating', $risk);
            })->where('status', 'Published')->where('verification_status', 'accepted')->paginate(9);
        }

        return view('client.suggested-ideas', compact('ideas', 'categories', 'selected_category', 'pagename', 'risk'));
    }
    /**
     * View an idea.
     *
     * @param  \App\Models\Idea $id
     */
    public function view($id)
    {
        $idea = Idea::with('user', 'categories', 'currencies', 'majorsectors', 'minorsectors', 'regions', 'countries')->find($id);
        $user = User::with('portfolio', 'wishlist')->find(Auth::user()->id);
        $portfolio = $user->portfolio;
        $wishlist = $user->wishlist;
        $pagename = $idea->title;

        return view('client.view-idea', compact('idea', 'pagename', 'portfolio', 'wishlist'));
    }
    /**
     * Add an idea to portfolio.
     *
     * @param  \App\Models\Idea $id
     */
    public function add_to_portfolio($id)
    {
        $user = Auth::user();
        $user->wishlist()->detach($id);
        $user->portfolio()->attach($id);


        return redirect()->back()->with('success', 'Congratulations, Added to portfolio successfully!');
    }
    /**
     * View portfolio.
     *
     */
    public function portfolio()
    {
        $user = User::with('portfolio')->find(Auth::user()->id);
        $ideas = $user->portfolio()->paginate(9);
        $pagename = 'My Portfolio';

        return view('client.portfolio', compact('ideas', 'pagename'));
    }
    /**
     * Add an idea to wishlist.
     *
     */
    public function add_to_wishlist($id)
    {
        $user = Auth::user();
        $user->wishlist()->attach($id);


        return redirect()->back()->with('success', 'Congratulations, Added to wishlist successfully!');
    }
    /**
     * View wishlist.
     *
     */
    public function wishlist()
    {
        $user = User::with('wishlist')->find(Auth::user()->id);
        $ideas = $user->wishlist()->paginate(9);
        $pagename = 'My Wishlist';

        return view('client.portfolio', compact('ideas', 'pagename'));
    }
    /**
     * View user profile.
     *
    */
    public function user_profile_view()
    {
        $categories = Category::all();
        $user = User::with('categories')->find(Auth::user()->id);
        $user_categories = $user->categories;
        return view('client.edit-profile', compact('categories', 'user_categories'));
    }
    /**
     * Update user profile.
     *
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
        $user->categories()->sync($request->preferences);
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    /**
     * Show change password form.
     *
     */
    public function change_password_view()
    {
        return view('client.change-password');
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
