<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::where('completed', 0)->with('user')->with('category');
        if ($request->getPathInfo() === '/search') {
            if ($request->has('title')) {
                $jobs = $jobs->where('title', $request->query('title'));
            }
            if ($request->has('salary')) {
                $jobs = $jobs->where('salary', '>=', $request->query('salary'));
            }
            if ($request->has('work_type')) {
                $jobs = $jobs->where('work_type', $request->query('work_type'));
            }
            if ($request->has('location')) {
                $jobs = $jobs->where('location', $request->query('location'));
            }
        }
        return view('welcome')
            ->with('jobs', $jobs->get());
    }
}
