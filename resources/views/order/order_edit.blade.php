<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Clients / " after-span="Edit Client" />

        <x-forms.horizontal-form title="Edit Order" description="Edit order information">

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
            <form action="{{ route('order.update', $order) }}" method="POST">
                @csrf <!--cross site resource forgery-->
                @method('PATCH')

                <x-forms.select-input label="Client*" id="client_id" :options="$clients" :properties="['value'=>'id', 'text'=>'name']" />

                <x-forms.money-input label="Total*" id="total" placeholder="100.00" value="{{ $order->total }}" />
                <x-forms.form-input type="date" label="Delivery Date*" id="delivery_date" placeholder="2021-10-24" value="{{ $order->delivery_date }}" />
                <x-forms.form-input type="time" label="Delivery Time*" id="delivery_time" placeholder="10:00" value="{{ $order->delivery_time }}" />
                <x-forms.form-input type="text" label="Street*" id="street" placeholder="Ruben Romero" value="{{ $order->street }}" />
                <x-forms.form-input type="text" label="Apt. Number*" id="apt_number" placeholder="713-3" value="{{ $order->apt_number }}" />
                <x-forms.form-input type="text" label="Neighborhood*" id="neighborhood" placeholder="Tonala" value="{{ $order->neighborhood }}" />
                <x-forms.form-input type="text" label="City*" id="city" placeholder="Guadalajara" value="{{ $order->city }}" />
                <x-forms.form-input type="text" label="State*" id="state" placeholder="Jalisco" value="{{ $order->state }}" />
                <x-forms.form-input type="text" label="Country*" id="country" placeholder="Mexico" value="{{ $order->country }}" />
                <x-forms.form-input type="text" label="Zipcode*" id="zipcode" placeholder="45678" value="{{ $order->zipcode }}" />
                <x-forms.form-input type="text" label="References" id="references" placeholder="Near the church" value="{{ $order->references }}" />

                <x-forms.form-submit> Update </x-forms.form-submit>
            </form>
            </x-horizontal-form>
    </div>
</x-mi-layout>