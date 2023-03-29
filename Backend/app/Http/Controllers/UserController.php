<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Capsule\Manager;

class UserController extends Controller
{
    //
    public function index()
    {
        $clients = User::where('role', 'client')->get();
        $relationship_manager = User::where('role', 'rm')->get();
        $ideators = User::where('role', 'ideator')->get();
        $pagename = 'Users';
        $data = [
            'clients' => $clients,
            'relationship_manager' => $relationship_manager,
            'ideators' => $ideators,
            'pagename' => 'Users'
        ];

        return view('admin.users-list', $data);
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
}
