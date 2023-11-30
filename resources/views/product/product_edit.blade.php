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

            @php
                $categories = array(
                    1 => array(
                        'value' => 'BRACELET',
                        'name' => 'Bracelet'
                    ),
                    2 => array(
                        'value' => 'NECKLACE',
                        'name' => 'Necklace'
                    ),
                    3 => array(
                        'value' => 'EARINGS',
                        'name' => 'Earings'
                    )
                );
            @endphp

            <!-- Create Post Form -->
            <form action="{{ route('product.update', $product) }}" 
                method="POST" 
                enctype="multipart/form-data"
            >
                @csrf <!--cross site resource forgery-->
                @method('PATCH')
                <x-forms.select-input label="Category" 
                                            id="category" 
                                            :options="$categories" 
                                            :properties="['value'=>'value', 
                                                            'text'=>'name']" 
                />
                <x-forms.form-input-req type="text" 
                                        label="Name*" 
                                        id="name" 
                                        placeholder="Skull Bracelet" 
                                        value="{{ $product->name }}" 
                />
                <x-forms.money-input label="Price*" 
                                        id="price" 
                                        placeholder="100.00" 
                                        value="{{ $product->price }}" 
                />
                <x-forms.form-input-req type="number" 
                                        label="Stock*" 
                                        id="stock" 
                                        placeholder="12" 
                                        value="{{ $product->stock }}" 
                />
                <x-forms.form-input type="text" 
                                    label="Description" 
                                    id="description" 
                                    placeholder="Beautiful necklace." 
                                    value="{{ $product->description }}" 
                />
                <x-forms.form-input type="file" 
                                    label="Image" 
                                    id="imge" 
                                    placeholder="" 
                                    value="" 
                />

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('product.index') }}" 
                            class="btn btn-md btn-danger m-1"> Cancel </a>
                        <button type="submit" 
                                class="btn btn-primary"
                        > Update </button>
                    </div>
                </div>
            </form>
        </x-horizontal-form>
    </div>
</x-mi-layout>