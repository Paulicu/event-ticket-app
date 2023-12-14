<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $speakers = Speaker::orderBy('nume','ASC')->paginate(5);
        $value=($request->input('page',1)-1) * 5;
        return view('speakers.list', compact('speakers'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, 
        [
            'nume' => 'required',
            'prenume' => 'required',
            'descriere' => 'required'
        ]);
        
        // Create new speaker:
        Speaker::create($request->all());
        return redirect()->route('speakers.index')->with('success', 'Your speaker was added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $speaker = Speaker::find($id);
        return view('speakers.show', compact('speaker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $speaker = Speaker::find($id);
        return view('speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, 
        [
            'nume' => 'required',
            'prenume' => 'required',
            'descriere' => 'required'
        ]);
        Speaker::find($id)->update($request->all());
        return redirect()->route('speakers.index')->with('success','Speaker updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Speaker::find($id)->delete();
        return redirect()->route('speakers.index')->with('success','Speaker removed successfully');
    }
}
