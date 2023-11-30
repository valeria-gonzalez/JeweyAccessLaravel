<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Clients / " after-span="New Client" />

        <x-forms.horizontal-form title="Create Client" description="Add a new client">

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
            <form action="{{ route('client.store') }}" method="POST">
                @csrf <!--cross site resource forgery-->
                <x-forms.form-input-req type="text" label="Name" id="name" placeholder="John" value="{{ old('name') }}" />
                <x-forms.form-input-req type="text" label="First Lastname" id="first_lastname" placeholder="Doe" value="{{ old('first_lastname') }}" />
                <x-forms.form-input-req type="text" label="Second Lastname" id="second_lastname" placeholder="Doe" value="{{ old('second_lastname') }}" />
                <x-forms.form-input-req type="tel" label="Phone Number" id="phone_number" placeholder="+521234567890" value="{{ old('phone_number') }}" />
                
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('client.index') }}" class="btn btn-md btn-danger m-1">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
            </x-horizontal-form>
    </div>
</x-mi-layout>