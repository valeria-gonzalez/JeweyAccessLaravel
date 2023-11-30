<x-mi-layout>
    @include('sweetalert::alert')
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Order / " after-span="All Orders" />
        <x-table.hoverable-table 
        title="All Orders"
        :headings="['Id', 'Delivery Date', 'Delivery Time', 'Status', 'Created By']"
        :models="$orders"
        :properties="['id', 'delivery_date', 'delivery_time', 'status', 'user']"
        :actions="['Show', 'Edit','Delete']"
        :action-routes="['order.show', 
                          'order.edit', 
                          'order.destroy'
                        ]"
    />
        
    </div>
</x-mi-layout>