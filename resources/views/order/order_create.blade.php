<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Order / " after-span="New Order" />

        <x-forms.horizontal-form title="Create Order" description="Add a new order">

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
            <form action="{{ route('order.store') }}" method="POST">
                @csrf <!--cross site resource forgery-->

                <x-forms.select-input label="Client*" id="client_id" :options="$clients" :properties="['value'=>'id', 'text'=>'name']"/>

                <x-forms.money-input label="Total*" id="total" placeholder="100.00" value="{{ old('total') }}" />
                <x-forms.form-input type="date" label="Delivery Date*" id="delivery_date" placeholder="2021-10-24" value="{{ old('delivery_date') }}" />
                <x-forms.form-input type="time" label="Delivery Time*" id="delivery_time" placeholder="10:00" value="{{ old('delivery_time') }}" />
                <x-forms.form-input type="text" label="Street*" id="street" placeholder="Ruben Romero" value="{{ old('street') }}" />
                <x-forms.form-input type="text" label="Apt. Number*" id="apt_number" placeholder="713-3" value="{{ old('apt_number') }}" />
                <x-forms.form-input type="text" label="Neighborhood*" id="neighborhood" placeholder="Tonala" value="{{ old('neighborhood') }}" />
                <x-forms.form-input type="text" label="City*" id="city" placeholder="Guadalajara" value="{{ old('city') }}" />
                <x-forms.form-input type="text" label="State*" id="state" placeholder="Jalisco" value="{{ old('state') }}" />
                <x-forms.form-input type="text" label="Country*" id="country" placeholder="Mexico" value="{{ old('country') }}" />
                <x-forms.form-input type="text" label="Zipcode*" id="zipcode" placeholder="45678" value="{{ old('zipcode') }}" />
                <x-forms.form-input type="text" label="References" id="references" placeholder="Near the church" value="{{ old('references') }}" />
                
                <x-forms.form-submit> Create </x-forms.form-submit>
            </form>
            </x-horizontal-form>
    </div>
</x-mi-layout>