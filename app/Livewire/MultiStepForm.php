<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Rules\MaxStock;
use Illuminate\Support\Facades\Gate;

class MultiStepForm extends Component
{
    public $method;
    public $order;

    public $clients;
    public $products;
    public $allProducts;
    public $orderProducts;

    public $client_id;
    public $status;
    public $total;
    public $delivery_date;
    public $delivery_time;
    public $street;
    public $apt_number;
    public $neighborhood;
    public $city;
    public $state;
    public $country;
    public $zipcode;
    public $references;

    public $totalSteps = 3;
    public $currentStep = 1;

    public function mount($method, $order = null)
    {
        $this->method = $method;
        $this->currentStep = 1;

        $this->clients = Client::all()->map(function ($client) {
            return [
                'id' => $client->id,
                'name' => $client->name . ' '
                    . $client->first_lastname . ' '
                    . $client->second_lastname,
            ];
        });

        $this->allProducts = Product::all();
        $this->orderProducts = [];
        $this->order = $order;

        if ($method === 'edit' && $order) {
            $this->client_id = $order->client_id;
            $this->status = $order->status;
            $this->total = $order->total;
            $this->delivery_date = $order->delivery_date;
            $this->delivery_time = $order->delivery_time;
            $this->street = $order->street;
            $this->apt_number = $order->apt_number;
            $this->neighborhood = $order->neighborhood;
            $this->city = $order->city;
            $this->state = $order->state;
            $this->country = $order->country;
            $this->zipcode = $order->zipcode;
            $this->references = $order->references;

            if ($order->products->isNotEmpty()) {
                $this->orderProducts = $order->products->map(function ($product) {
                    return [
                        'product_id' => $product->id,
                        'quantity' => $product->pivot->quantity,
                    ];
                })->toArray();
            }
        }
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }

    public function addProduct()
    {
        $this->orderProducts[] = [];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'client_id' => 'required|min:1',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'delivery_date' => 'required|date',
                'delivery_time' => 'required',
                'street' => 'required',
                'apt_number' => 'required',
                'neighborhood' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
                'status' => 'required'
            ]);
        }
    }

    public function create()
    {
        $this->resetErrorBag();

        if ($this->currentStep == 3) {
            $this->validate([
                'orderProducts' => 'required|array|min:1',
            ], [
                'orderProducts.required' => 'The order must have products.',
            ]);

            // Validate that no two keys in $orderProducts are the same
            $this->validate([
                'orderProducts.*.product_id' => 'distinct',
            ], [
                'orderProducts.*.product_id.distinct' => 'A product must not be chosen more than once.',
            ]);

            // Validate each element in $orderProducts
            foreach ($this->orderProducts as $index => $orderProduct) {
                $this->validate([
                    "orderProducts.$index.product_id" => 'required|numeric',
                ], [
                    "orderProducts.$index.product_id" => 'At least one product must be added to the order.',
                ]);

                $product = Product::find($orderProduct['product_id']);

                $this->validate([
                    "orderProducts.$index.quantity" => ['required', 'numeric', 'min:1', new MaxStock($product->stock)],
                ], [
                    "orderProducts.$index.quantity" => 'Quantity must be at least one and must not exceed available stock.',
                ]);
            }
        }

        $values = array(
            "client_id" => $this->client_id,
            "status" => $this->status,
            "delivery_date" => $this->delivery_date,
            "delivery_time" => $this->delivery_time,
            "street" => $this->street,
            "apt_number" => $this->apt_number,
            "neighborhood" => $this->neighborhood,
            "city" => $this->city,
            "state" => $this->state,
            "country" => $this->country,
            "zipcode" => $this->zipcode,
            "references" => $this->references,
            "user_id" => Auth::id(),
            "updated_by" => Auth::user()->name,
        );


        $order = Order::create($values);

        foreach ($this->orderProducts as $orderProduct) {
            $product = Product::find($orderProduct['product_id']);

            $this->total += $product->price * $orderProduct['quantity'];

            //$product->stock -= $orderProduct['quantity'];
            //$product->save();

            $order->products()->attach($orderProduct['product_id'], [
                'quantity' => $orderProduct['quantity'],
            ]);
        }

        $order->total = $this->total;
        $order->save();

        Alert::success('Order Created Successfully', 'We have created your order successfully');
        return redirect()->route('order.index');
    }

    public function edit()
    {
        $this->resetErrorBag();

        if ($this->currentStep == 3) {
            $this->validate([
                'orderProducts' => 'required|array|min:1',
            ], [
                'orderProducts.required' => 'The order must have products.',
            ]);

            // Validate that no two keys in $orderProducts are the same
            $this->validate([
                'orderProducts.*.product_id' => 'distinct',
            ], [
                'orderProducts.*.product_id.distinct' => 'A product must not be chosen more than once.',
            ]);

            // Validate each element in $orderProducts
            foreach ($this->orderProducts as $index => $orderProduct) {
                $this->validate([
                    "orderProducts.$index.product_id" => 'required|numeric',
                ], [
                    "orderProducts.$index.product_id" => 'At least one product must be added to the order.',
                ]);

                $product = Product::find($orderProduct['product_id']);

                $this->validate([
                    "orderProducts.$index.quantity" => ['required', 'numeric', 'min:1', new MaxStock($product->stock)],
                ], [
                    "orderProducts.$index.quantity" => 'Quantity must be at least one and must not exceed available stock.',
                ]);
            }
        }

        $order = Order::find($this->order->id);

        $response = Gate::inspect('update', $order);

        if($response->denied()){
            Alert::warning('Access Denied', $response->message());
            return redirect()->route('order.index');
        }

        // Keep track of product IDs that are still selected in the updated order
        // $updatedProductIds = collect($this->orderProducts)
        //     ->pluck('product_id')
        //     ->filter()
        //     ->all();

        // // Detach products that are no longer selected in the updated order
        // $detachedProductIds = $order->products()
        //     ->whereNotIn('product_id', $updatedProductIds)
        //     ->pluck('product_id')
        //     ->all();

        // $order->products()->detach($detachedProductIds);

        // Update order data
        $order->update([
            'client_id' => $this->client_id,
            'status' => $this->status,
            'delivery_date' => $this->delivery_date,
            'delivery_time' => $this->delivery_time,
            'street' => $this->street,
            'apt_number' => $this->apt_number,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'zipcode' => $this->zipcode,
            'references' => $this->references,
            'updated_by' => Auth::user()->name,
        ]);

        // Sync products for the order
        $order->products()->detach(); // Detach existing relationships
        foreach ($this->orderProducts as $orderProduct) {
            $product = Product::find($orderProduct['product_id']);

            $this->total += $product->price * $orderProduct['quantity'];

            $order->products()->attach($orderProduct['product_id'], [
                'quantity' => $orderProduct['quantity'],
            ]);

            // Update stock for each product
            //$product->stock -= $orderProduct['quantity'];
            //$product->save();
        }

        // foreach ($this->orderProducts as $orderProduct) {
        //     $product = Product::find($orderProduct['product_id']);
        //     $order->products()->syncWithoutDetaching([$orderProduct['product_id'] 
        //                                                 => ['quantity' => $orderProduct['quantity']]]);
            
        //     $this->total += $product->price * $orderProduct['quantity'];                                            
    
        //     // Update stock for each product
        //     $product->stock -= $orderProduct['quantity'];
        //     $product->save();
        // }

        $order->update([
            'total' => $this->total,
        ]);

        // foreach ($detachedProductIds as $detachedProductId) {
        //     $detachedProduct = Product::find($detachedProductId);
        //     $detachedProduct->stock += $order->products()->find($detachedProductId)->pivot->quantity;
        //     $detachedProduct->save();
        // }

        Alert::success('Order Updated Successfully', 'We have updated your order successfully');
        return redirect()->route('order.index');
    }
}
