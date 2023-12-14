<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;

class BookingController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $bookings = Booking::with('event', 'speaker')->orderBy('created_at','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('bookings.list', compact('bookings'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $evenimente = Event::all();
        $speakeri = Speaker::all();

        return view('bookings.create', compact('evenimente', 'speakeri'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, 
        [
            'ID_SPEAKER' => 'required',
            'ID_EVENT' => 'required'
        ]);
        
        // Create new Booking:
        Booking::create($request->all());
        return redirect()->route('bookings.index')->with('success', 'Your Booking was added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $booking = Booking::find($id);

        $evenimente = $booking->event->titlu;
        $speakeri = $booking->speaker->nume;

        return view('bookings.show', compact('booking', 'evenimente', 'speakeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $booking = Booking::find($id);

        $evenimente = Event::all();
        $speakeri = Speaker::all();

        return view('bookings.edit', compact('booking', 'evenimente', 'speakeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, 
        [
            'ID_SPEAKER' => 'required',
            'ID_EVENT' => 'required'
        ]);
        Booking::find($id)->update($request->all());
        return redirect()->route('bookings.index')->with('success','Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Booking::find($id)->delete();
        return redirect()->route('bookings.index')->with('success','Booking removed successfully');
    }
}
