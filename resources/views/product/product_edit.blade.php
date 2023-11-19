<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Product / " after-span="Edit Product" />

        <x-forms.horizontal-form title="Edit Product" description="Edit a product">

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
            <form action="{{ route('product.update', $product) }}" method="POST">
                @csrf <!--cross site resource forgery-->
                @method('PATCH')
                <x-forms.form-input type="text" label="Name*" id="name" placeholder="Skull Bracelet" value="{{ $product->name }}" />
                <x-forms.form-input type="text" label="Category*" id="category" placeholder="Bracelet" value="{{ $product->category }}" />
                <x-forms.money-input label="Price*" id="price" placeholder="100.00" value="{{ $product->price }}" />
                <x-forms.form-input type="number" label="Stock*" id="stock" placeholder="12" value="{{ $product->stock }}" />
                <x-forms.form-input type="text" label="Description" id="description" placeholder="Beautiful necklace." value="{{ $product->description }}" />
                
                <x-forms.form-submit> Update </x-forms.form-submit>
            </form>
            </x-horizontal-form>
    </div>
</x-mi-layout>