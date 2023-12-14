<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Partener;
use App\Models\Sponsor;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $events = Event::with('partener', 'sponsor')->orderBy('titlu','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('events.list', compact('events'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $parteneri = Partener::all();
        $sponsori = Sponsor::all();

        return view('events.create', compact('parteneri', 'sponsori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, 
        [
            'titlu' => 'required',                        
            'descriere' => 'required',
            'date' => 'required',
            'contact' => 'required',
            'ID_PARTENER' => 'required',
            'ID_SPONSOR' => 'required',
            'locatie' => 'required'
        ]);
        
        // Create new event:
        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Your event was added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $event = Event::find($id);

        $parteneri = $event->partener->nume;
        $sponsori = $event->sponsor->nume;

        return view('events.show', compact('event', 'parteneri', 'sponsori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $event = Event::find($id);

        $parteneri = Partener::all();
        $sponsori = Sponsor::all();

        return view('events.edit', compact('event', 'parteneri', 'sponsori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, 
        [
            'titlu' => 'required',                        
            'descriere' => 'required',
            'date' => 'required',
            'contact' => 'required',
            'ID_PARTENER' => 'required',
            'ID_SPONSOR' => 'required',
            'locatie' => 'required'
        ]);
        Event::find($id)->update($request->all());
        return redirect()->route('events.index')->with('success','Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Event::find($id)->delete();
        return redirect()->route('events.index')->with('success','Event removed successfully');
    }
}
