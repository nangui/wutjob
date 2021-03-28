<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.profile')->with('cv', Auth::user()->cv);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
            'speciality' => 'required|string|max:100',
            'level' => 'required|string|max:100',
            'experience' => 'required|string|max:100',
        ]);

        $user = Auth::user();

        if (!$user->cv) {
            CurriculumVitae::create([
                'user_id' => $user->id,
                'age' => $request->age,
                'email' => $user->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'speciality' => $request->speciality,
                'level' => $request->level,
                'experience' => $request->experience
            ]);
        }
        return redirect()->route('user.cv.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user.curriculum-vitae');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.edit-curriculum-vitae')->with('profile', Auth::user()->cv);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
            'speciality' => 'required|string|max:100',
            'level' => 'required|string|max:100',
            'experience' => 'required|string|max:100',
        ]);

        $user = Auth::user()->cv->update([
            'user_id' => Auth::user()->id,
            'age' => $request->age,
            'email' => Auth::user()->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'speciality' => $request->speciality,
            'level' => $request->level,
            'experience' => $request->experience
        ]);

        return redirect()->route('user.cv.show');
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
