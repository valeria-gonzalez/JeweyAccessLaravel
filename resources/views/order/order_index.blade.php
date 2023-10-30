<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Order / " after-span="All Orders" />
        <x-table.hoverable-table 
        title="All Orders"
        :headings="['Id', 'Delivery Date', 'Delivery Time', 'Status']"
        :models="$orders"
        :properties="['id', 'delivery_date', 'delivery_time', 'status']"
        :actions="['Show', 'Edit','Delete']"
        :action-routes="['order.show', 
                          'order.edit', 
                          'order.destroy'
                        ]"
    />
        
    </div>
</x-mi-layout>