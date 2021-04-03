<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\CurriculumVitae;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->profile === 'recruiter') {
            return redirect()->back()->with('warning', 'Un recruteur ne peut postuler à un job.');
        }

        // if (!CurriculumVitae::where('user_id', Auth::id())->get()) {
        //     return redirect()->back()->with('warning', 'Vous devez créé un cv avant de postuler.');
        // }

        $application = Apply::where('user_id', Auth::id())->where('job_id', $request->job_id)
            ->get();

        if ($application) {
            return redirect()->back()->with('warning', 'Vous avez déjà postuler à ce job.');
        }

        Apply::create([
            'user_id' => Auth::id(),
            'job_id' => $request->job_id,
            'comment' => ''
        ]);

        return redirect()->back()->with('message', 'Vous avez postulé au job.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
