<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Http\Requests\StoreRelationshipManagerRequest;
use App\Http\Requests\UpdateRelationshipManagerRequest;
use App\Models\RelationshipManager;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;



class RelationshipManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $pagename = 'Dashboard';
        $clients = User::where('role', 'client')->count();
        $ideas = Idea::count();
        $accepted_ideas = Idea::where('verification_status', 'accepted')->count();
        $rejected_ideas = Idea::where('verification_status', 'rejected')->count();
        $pending_ideas = Idea::where('verification_status', 'pending')->count();
        return view('relationship-manager.dashboard', compact('pagename', 'clients', 'ideas', 'accepted_ideas', 'rejected_ideas', 'pending_ideas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRelationshipManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRelationshipManagerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RelationshipManager  $relationshipManager
     * @return \Illuminate\Http\Response
     */
    public function show(RelationshipManager $relationshipManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RelationshipManager  $relationshipManager
     * @return \Illuminate\Http\Response
     */
    public function edit(RelationshipManager $relationshipManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRelationshipManagerRequest  $request
     * @param  \App\Models\RelationshipManager  $relationshipManager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRelationshipManagerRequest $request, RelationshipManager $relationshipManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RelationshipManager  $relationshipManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelationshipManager $relationshipManager)
    {
        //
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);      

        $credentials = $request->only('email', 'password');
        // return dd($request);
        Auth::guard('rm')->attempt($credentials);

        return redirect()->route('relationship-manager.dashboard');
    }

    public function list(Request $request)
    { 
        $categories = Category::all();
        $filter_category = $request->query('category');
        if($filter_category != ''){
            $ideas = Idea::where('status', 'Published')->whereIn('verification_status', ['accepted', 'pending'])->
            whereHas('categories', 
            function ($query) use ($filter_category) {
                $query->where('categories.id', $filter_category);
            })->get();
        } else {
            $ideas = Idea::where('status', 'Published')->whereIn('verification_status', ['accepted', 'pending'])->get();
        }

        $data = [
            'ideas' => $ideas,
            'categories' => $categories,
            'selected_category' => $filter_category
        ];

        return view('relationship-manager.rm-idea-list', $data);
    }

    public function view($id)
    { 
        $idea = Idea::find($id); 

        $data = [
            'idea' => $idea,
            'pagename' => $idea->title
        ];
        return view('relationship-manager.rm-view-idea', $data);
    }

    public function show_profile()
    { 
        return view('relationship-manager.edit-profile');
    }

    public function update_profile(Request $request)
    { 
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function accept($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->verification_status = 'accepted';
        $idea->save();
        return redirect()->route("relationship-manager.ideas")->with('success', 'Idea accepted successfully!');
    }

    public function reject($id, Request $request)
    { 
        $idea = Idea::find($id);
        $idea->verification_status = 'rejected';
        $idea->save();
        return redirect()->route("relationship-manager.ideas")->with('success', 'Idea rejected successfully!');
    }
}
