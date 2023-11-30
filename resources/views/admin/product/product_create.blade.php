<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Product / " after-span="New Product" />

        <x-forms.horizontal-form title="Create Product" description="Add a new product">

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
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf <!--cross site resource forgery-->
                <x-forms.form-input-req type="text" label="Name*" id="name" placeholder="Skull Bracelet" value="{{ old('name') }}" />
                <x-forms.form-input-req type="text" label="Category*" id="category" placeholder="Bracelet" value="{{ old('category') }}" />
                <x-forms.money-input label="Price*" id="price" placeholder="100.00" value="{{ old('price') }}" />
                <x-forms.form-input-req type="number" label="Stock*" id="stock" placeholder="12" value="{{ old('stock') }}" />
                <x-forms.form-input type="text" label="Description" id="description" placeholder="Beautiful necklace." value="{{ old('description') }}" />
                <x-forms.form-input type="file" label="Image" id="imge" placeholder="" value="" />
                
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('product.index') }}" class="btn btn-md btn-danger m-1">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
            </x-horizontal-form>
    </div>
</x-mi-layout>