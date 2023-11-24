<x-mi-layout>
    @include('sweetalert::alert')
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Product / " after-span="All Products" />
        <x-table.hoverable-table 
            title="All Products" 
            :headings="['Id', 'Name', 'Category', 'Stock', 'Price']" 
            :models="$products" 
            :properties="['id', 'name', 'category', 'stock', 'price']" 
            :actions="['Show', 'Edit','Delete']" 
            :action-routes="['product.show', 
                            'product.edit', 
                            'product.destroy'
                            ]" 
        />
    </div>
</x-mi-layout>