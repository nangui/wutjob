<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->with('jobs', Job::where('completed', 0)->with('user')->with('category')->get());
    }
}
