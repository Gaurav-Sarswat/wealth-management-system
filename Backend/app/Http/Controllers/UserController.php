<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Capsule\Manager;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'rm'){
            $pagename = 'Clients';
            $clients = User::where('role', 'client')->get();
            $data = [
                'clients' => $clients,
                'pagename' => $pagename
            ];
            return view('relationship-manager.users-list', $data);
        }
        if ($user->role == 'admin'){
            $pagename = 'Users';
            $clients = User::where('role', 'client')->get();
            $relationship_manager = User::where('role', 'rm')->get();
            $ideators = User::where('role', 'ideator')->get();
            $data = [
                'clients' => $clients,
                'relationship_manager' => $relationship_manager,
                'ideators' => $ideators,
                'pagename' => $pagename
            ];
            return view('admin.users-list', $data);
        }

    }
    public function show_form()
    {
        $pagename = 'Create New User';
        return view('admin.add-user', compact('pagename'));
    }
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
    public function view_user($id)
    {
        $pagename = 'User Details';
        $user = User::with('categories')->find($id); 
        // return dd($user);
        return view('relationship-manager.rm-view-user', compact('user', 'pagename'));
    }
}
