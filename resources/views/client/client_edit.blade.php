<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Clients / " after-span="Edit Client" />

        <x-forms.horizontal-form title="Edit Client" description="Edit client information">

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
            <form action="{{ route('client.update', $client) }}" method="POST">
                @csrf <!--cross site resource forgery-->
                @method('PATCH')
                <x-forms.form-input type="text" label="Name" id="name" placeholder="John" value="{{ $client->name }}" />
                <x-forms.form-input type="text" label="First Lastname" id="first_lastname" placeholder="Doe" value="{{ $client->first_lastname }}" />
                <x-forms.form-input type="text" label="Second Lastname" id="second_lastname" placeholder="Doe" value="{{ $client->second_lastname }}" />
                <x-forms.form-input type="tel" label="Phone Number" id="phone_number" placeholder="+521234567890" value="{{ $client->phone_number }}" />

                <x-forms.form-submit> Update </x-forms.form-submit>
            </form>
            </x-horizontal-form>
    </div>
</x-mi-layout>