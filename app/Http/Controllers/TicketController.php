<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Event;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function test()
    {
        return "Test method in TicketController";
    }
    public function index(Request $request)
    {
        //
        $tickets = Ticket::with('event')->orderBy('status','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('tickets.list', compact('tickets'))->with('i', $value);
    }

    public function indexProduct()
    {
        $products = Ticket::all();
        return view('products', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $evenimente = Event::all();

        return view('tickets.create', compact('evenimente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, 
        [
            'price' => 'required',                        
            'status' => 'required',
            'ID_EVENT' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'code' => 'required',
        ]);
        
        // Create new ticket:
        Ticket::create($request->all());
        return redirect()->route('tickets.index')->with('success', 'Your ticket was added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ticket = Ticket::find($id);

        $evenimente = $ticket->event->titlu;
        return view('tickets.show', compact('ticket', 'evenimente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $ticket = Ticket::find($id);

        $evenimente = Event::all();
        return view('tickets.edit', compact('ticket', 'evenimente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, 
        [
            'price' => 'required',                        
            'status' => 'required',
            'ID_EVENT' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'code' => 'required',
        ]);
        Ticket::find($id)->update($request->all());
        return redirect()->route('tickets.index')->with('success','Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Ticket::find($id)->delete();
        return redirect()->route('tickets.index')->with('success','Ticket removed successfully');
    }

    // COS:
    public function cart()
    {
        return view('cart');
    }
   
    public function addToCart($id)
    {
        $product = Ticket::find($id);
        if(!$product) 
        {
            abort(404);
        }

        $cart = session()->get('cart');

        // dacă cart este gol se pune primul product
        if(!$cart) 
        {
            $cart = 
            [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Bilet adaugat cu succes in cos!');
        }

        // daca cart nu este gol at verificam daca produsul exista pt a incrementa cantitate
        if(isset($cart[$id])) 
        {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Bilet adaugat cu succes in cos!');
        }
        // daca item nu exista in cos at addaugam la cos cu quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Bilet adaugat cu succes in cos!');
    }

    public function updateCos(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cos modificat cu succes');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) 
        {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) 
            {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Bilet sters cu succes!');
        }
    }


}
