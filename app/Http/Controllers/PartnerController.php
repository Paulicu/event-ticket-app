<?php

namespace App\Http\Controllers;

use App\Models\Partener;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $partners = Partener::orderBy('nume','ASC')->paginate(5);
        $value=($request->input('page',1)-1) * 5;
        return view('partners.list', compact('partners'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('partners.create');
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
        
        // Create new partner:
        Partener::create($request->all());
        return redirect()->route('partners.index')->with('success', 'Your partner was added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $partener = Partener::find($id);
        return view('partners.show', compact('partener'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $partener = Partener::find($id);
        return view('partners.edit', compact('partener'));
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
        Partener::find($id)->update($request->all());
        return redirect()->route('partners.index')->with('success','Partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Partener::find($id)->delete();
        return redirect()->route('partners.index')->with('success','Partner removed successfully');
    }
}
