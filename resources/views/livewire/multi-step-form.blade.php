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

    <!-- Create Post Form -->

    <form wire:submit.prevent="{{ $method }}">
        @csrf <!--cross site resource forgery-->

        <!--STEP 1-->
        @if($currentStep == 1)
        <x-liveforms.select-input label="Client*" id="client_id" :options="$clients" :properties="['value'=>'id', 'text'=>'name']" />
        @endif

        <!--STEP2-->
        @if($currentStep == 2)
        <div class="step-one">
            <x-liveforms.money-input label="Total*" id="total" placeholder="100.00" value="{{ old('total') }}" />
            <x-liveforms.form-input type="date" label="Delivery Date*" id="delivery_date" placeholder="2021-10-24" value="{{ old('delivery_date') }}" />
            <x-liveforms.form-input type="time" label="Delivery Time*" id="delivery_time" placeholder="10:00" value="{{ old('delivery_time') }}" />
            <x-liveforms.form-input type="text" label="Street*" id="street" placeholder="Ruben Romero" value="{{ old('street') }}" />
            <x-liveforms.form-input type="text" label="Apt. Number*" id="apt_number" placeholder="713-3" value="{{ old('apt_number') }}" />
            <x-liveforms.form-input type="text" label="Neighborhood*" id="neighborhood" placeholder="Tonala" value="{{ old('neighborhood') }}" />
            <x-liveforms.form-input type="text" label="City*" id="city" placeholder="Guadalajara" value="{{ old('city') }}" />
            <x-liveforms.form-input type="text" label="State*" id="state" placeholder="Jalisco" value="{{ old('state') }}" />
            <x-liveforms.form-input type="text" label="Country*" id="country" placeholder="Mexico" value="{{ old('country') }}" />
            <x-liveforms.form-input type="text" label="Zipcode*" id="zipcode" placeholder="45678" value="{{ old('zipcode') }}" />
            <x-liveforms.form-input type="text" label="References" id="references" placeholder="Near the church" value="{{ old('references') }}" />
        </div>
        @endif

        <!--STEP 2-->
        @if($currentStep == 3)
        <div class="step-two">
             @livewire('product-select')
        </div>
        @endif

        <div class="action-buttons d-flex justify-content-end bg-white pt-2 pb-2">
            @if($currentStep > 1 and $currentStep <= $totalSteps) 
            <button type="button" class="btn btn-md btn-secondary m-1" wire:click="decreaseStep()">
                Back
            </button>
            @endif

            @if($currentStep >= 1 and $currentStep < $totalSteps) 
            <button type="button" class="btn btn-md btn-success m-1" wire:click="increaseStep()">
                Next
            </button>
            @endif

            @if($currentStep == $totalSteps)
            <button type="submit" class="btn btn-md btn-primary m-1">Create</button>
            @endif
        </div>
    </form>
</div>