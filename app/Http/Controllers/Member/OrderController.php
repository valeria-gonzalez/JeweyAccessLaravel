<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('delivery_date', 'asc')
            ->orderBy('delivery_time', 'asc')
            ->get();
        
        return view('member.order.order_user_index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.order.order_create');
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

        return redirect()->route('member.order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $products = $order->products;
        return view('member.order.order_show', compact('order', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('member.order.order_edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $response = Gate::inspect('update', $order);
        if($response->denied()){
            Alert::warning('Access Denied', $response->message());
            return redirect()->route('member.order.index');
        }

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
        return redirect()->route('member.order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $response = Gate::inspect('delete', $order);
        if($response->denied()){
            Alert::warning('Access Denied', $response->message());
            return redirect()->route('member.order.index');
        }

        $order->delete();
        Alert::warning('Order Deleted', 'The order has been deleted');
        return redirect()->route('member.order.index');
    }
}