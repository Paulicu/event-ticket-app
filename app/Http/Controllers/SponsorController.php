<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $sponsors = Sponsor::orderBy('nume','ASC')->paginate(5);
        $value=($request->input('page',1)-1) * 5;
        return view('sponsors.list', compact('sponsors'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, 
        [
            'nume' => 'required'
        ]);
        
        // Create new sponsor:
        Sponsor::create($request->all());
        return redirect()->route('sponsors.index')->with('success', 'Your sponsor was added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $sponsor = Sponsor::find($id);
        return view('sponsors.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $sponsor = Sponsor::find($id);
        return view('sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, 
        [
            'nume' => 'required'
        ]);
        Sponsor::find($id)->update($request->all());
        return redirect()->route('sponsors.index')->with('success','Sponsor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Sponsor::find($id)->delete();
        return redirect()->route('sponsors.index')->with('success','Sponsor removed successfully');
    }
}
