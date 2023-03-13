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
    
}
