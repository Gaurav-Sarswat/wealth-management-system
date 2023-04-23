<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Idea;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Capsule\Manager;

class UserController extends Controller
{
    /**
     * Show list of users.
     *
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'rm'){
            $pagename = 'Clients';
            $clients = User::where('manager_id', $user->id)->paginate(5);
            $data = [
                'clients' => $clients,
                'pagename' => $pagename
            ];
            return view('relationship-manager.users-list', $data);
        }
        if ($user->role == 'admin'){
            $pagename = 'All Users';
            $clients = User::where('role', 'client')->paginate(5, ['*'], 'clients');
            $relationship_managers = User::where('role', 'rm')->paginate(5, ['*'], 'relationship_managers');
            $ideators = User::where('role', 'ideator')->paginate(5, ['*'], 'ideators');
            
            $data = [
                'clients' => $clients,
                'relationship_managers' => $relationship_managers,
                'ideators' => $ideators,
                'pagename' => $pagename
            ];
            return view('admin.users-list', $data);
        }

    }
    /**
     * Show add user form.
     *
     */
    public function show_form()
    {
        $pagename = 'Create New User';
        return view('admin.add-user', compact('pagename'));
    }
    /**
     * Add a user.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'number' => ['required', 'string', 'min:10', 'max:11', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        event(new Registered($user));

        return redirect()->route('admin.users')->with('success', 'User created successfully!');
    }
    /**
     * View user details.
     *
     * @param  \App\Models\User $id
     */
    public function view_user($id)
    {
        $user_role = Auth::user();

        if ($user_role->role == 'rm'){
            $pagename = 'Client Details';
            $user = User::with('categories')->find($id); 
            return view('relationship-manager.rm-view-user', compact('user', 'pagename'));
        }
        if ($user_role->role == 'admin'){
            $pagename = 'User Details';
            $user = User::with('categories','portfolio')->find($id); 
            $portfolio = $user->portfolio();
            $rmclients = User::with('clients')->find($id);
            $ideacount = Idea::where('user_id', $id)->count();
            
            return view('admin.admin-view-user', compact('user', 'pagename', 'portfolio', 'rmclients', 'ideacount'));
        }
    }
}
