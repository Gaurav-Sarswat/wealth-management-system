<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRelationshipManagerRequest;
use App\Http\Requests\UpdateRelationshipManagerRequest;
use App\Models\RelationshipManager;
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
        return view('dashboard')->with('pagename', 'Dashboard');
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
}
