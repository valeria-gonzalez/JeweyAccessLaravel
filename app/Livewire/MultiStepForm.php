<?php

namespace App\Livewire;
use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MultiStepForm extends Component
{
    public $clients;
    public $products;
    public $method;

    public $client_id;
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

    public function mount($method)
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

        $this->products = Product::all();  
    }

    public function render()
    {
        return view('livewire.multi-step-form');
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
            ]);
        }
    }

    public function create()
    {
        $this->resetErrorBag();

        if($this->currentStep == 3){
            $this->validate([
                'product_id'=>'required'
            ]);
        }

        $values = array(
            "client_id" => $this->client_id,
            "total" => $this->total,
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
        );

        Order::create($values);
        Alert::success('Order Created Successfully', 'We have created your order successfully');
        return redirect()->route('order.index');
    }
}
