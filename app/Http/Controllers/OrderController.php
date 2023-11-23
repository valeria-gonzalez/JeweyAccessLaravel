<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $orders = Order::orderBy('delivery_date', 'asc')
            ->orderBy('delivery_time', 'asc')
            ->get();

        return view('order.order_index', compact('orders'));
    }

    public function myorders(){
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('delivery_date', 'asc')
            ->orderBy('delivery_time', 'asc')
            ->get();
        
        return view('order.order_user_index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $products = Product::all();

        // $clients = Client::all()->map(function ($client) {
        //     return [
        //         'id' => $client->id,
        //         'name' => $client->name . ' '
        //             . $client->first_lastname . ' '
        //             . $client->second_lastname,
        //     ];
        // });

        // return view('order.order_create', compact('clients', 'products'));
        return view('order.order_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $req = $request->validate([
            'total' => 'required|decimal:2',
            'delivery_date' => 'required|date',
            'delivery_time' => 'required',
            'street' => 'required',
            'apt_number' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'client_id' => 'required',
        ]);
        
        $request->merge(['user_id' => Auth::id()]);
        Order::create($request->all());

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order/order_show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $clients = Client::all()->map(function ($client) {
            return [
                'id' => $client->id,
                'name' => $client->name . ' '
                    . $client->first_lastname . ' '
                    . $client->second_lastname,
            ];
        });
        return view('order/order_edit', compact('clients', 'order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $req = $request->validate([
            'total' => 'required|decimal:2',
            'delivery_date' => 'required|date',
            'delivery_time' => 'required',
            'street' => 'required',
            'apt_number' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'client_id' => 'required',
        ]);

        $request->merge([
            'street' => strtoupper($request->street),
            'apt_number' => strtoupper($request->apt_number),
            'neighborhood' => strtoupper($request->neighborhood),
            'city' => strtoupper($request->city),
            'state' => strtoupper($request->state),
            'country' => strtoupper($request->country),
            'zipcode' => strtoupper($request->zipcode),
            'references' => strtoupper($request->references),
        ]);

        Order::where('id', $order->id)->update($request->except('_token', '_method'));
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
