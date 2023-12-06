<div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif

    @php
        $status = array(
            1 => array(
                'value' => 'PENDING',
                'name' => 'Pending'
            ),
            2 => array(
                'value' => 'CANCELLED',
                'name' => 'Cancelled'
            ),
            3 => array(
                'value' => 'DELIVERED',
                'name' => 'Delivered'
            )
        );
    @endphp

    <!-- Create Post Form -->

    <form wire:submit.prevent="{{ $method }}">
        @csrf

        <!--STEP 1-->
        @if($currentStep == 1)
        <div class="step-one">
            <x-liveforms.select-input label="Client*" 
                                        id="client_id" 
                                        :options="$clients" 
                                        :properties="[
                                                    'value'=>'id', 
                                                    'text'=>'full_name'
                                                    ]" 
            />
        </div>
        @endif

        <!--STEP2-->
        @if($currentStep == 2)
        <div class="step-two">
            <x-liveforms.select-input label="Status" 
                                        id="status" 
                                        :options="$status" 
                                        :properties="[
                                                    'value'=>'value', 
                                                    'text'=>'name'
                                                    ]" 
            />
            <x-liveforms.form-input-req type="date" 
                                        label="Delivery Date*" 
                                        id="delivery_date" 
                                        placeholder="2021-10-24"
            />
            <x-liveforms.form-input-req type="time" 
                                        label="Delivery Time*" 
                                        id="delivery_time" 
                                        placeholder="10:00"
            />
            <x-liveforms.form-input-req type="text" 
                                        label="Street*" 
                                        id="street" 
                                        placeholder="Ruben Romero"
            />
            <x-liveforms.form-input-req type="text" 
                                        label="Apt. Number*" 
                                        id="apt_number" 
                                        placeholder="713-3"
            />
            <x-liveforms.form-input-req type="text" 
                                        label="Neighborhood*" 
                                        id="neighborhood" 
                                        placeholder="Tonala"
            />
            <x-liveforms.form-input-req type="text" 
                                        label="City*" 
                                        id="city" 
                                        placeholder="Guadalajara"
            />
            <x-liveforms.form-input-req type="text" 
                                        label="State*" 
                                        id="state" 
                                        placeholder="Jalisco"
            />
            <x-liveforms.form-input-req type="text" 
                                        label="Country*" 
                                        id="country" 
                                        placeholder="Mexico"
            />
            <x-liveforms.form-input-req type="text" 
                                        label="Zipcode*" 
                                        id="zipcode" 
                                        placeholder="45678"
            />
            <x-liveforms.form-input type="text" 
                                    label="References" 
                                    id="references" 
                                    placeholder="Near the church"
            />
        </div>
        @endif

        <!--STEP 2-->
        @if($currentStep == 3)
        <div class="step-three">
            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderProducts as $index => $orderProduct)
                        <tr>
                            <td>
                                <select name="orderProducts[{{ $index }}][product_id]" 
                                        wire:model="orderProducts.{{ $index }}.product_id" 
                                        class="form-control"
                                >
                                    <option value="">-- choose product --</option>
                                    @if($allProducts->count() > 0)
                                        @foreach ($allProducts as $product)
                                            @if($product->stock > 0)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name }} (${{ number_format($product->price, 2) }}) ({{ $product->stock }} available)
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </td>
                            <td>
                                <input type="number" 
                                        name="orderProducts[{{ $index }}][quantity]" 
                                        class="form-control" 
                                        wire:model="orderProducts.{{ $index }}.quantity" 
                                        min="1" />
                            </td>
                            <td>
                                <a href="#" 
                                    wire:click.prevent="removeProduct({{ $index }})"
                                > Delete </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary"
                                 wire:click.prevent="addProduct"
                        > + Add Another Product </button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="action-buttons d-flex justify-content-end bg-white pt-2 pb-2">
            @if($currentStep == 1)
                <a href="{{ route('order.index') }}" 
                    class="btn btn-md btn-danger m-1"
                > Cancel </a>
            @endif
            
            @if($currentStep > 1 and $currentStep <= $totalSteps) 
                <button type="button" 
                        class="btn btn-md btn-secondary m-1" 
                        wire:click="decreaseStep()"
                > Back </button>
            @endif

            @if($currentStep >= 1 and $currentStep < $totalSteps) 
                <button type="button" 
                        class="btn btn-md btn-success m-1" 
                        wire:click="increaseStep()"
                > Next </button>
            @endif

            @if($currentStep == $totalSteps)
                <button type="submit" class="btn btn-md btn-primary m-1">
                    {{ ucfirst($method) }}
                </button>
            @endif
        </div>
    </form>
</div>