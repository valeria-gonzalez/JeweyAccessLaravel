<x-mi-layout>
    <x-text.page-heading1 span="Client / " after-span="List Clients"/> 

    <x-table.hoverable-table 
        title="All Clients"
        :headings="['Name', 'Last Name', 'Last Name', 'Phone Number']"
        :models="$clients"
        :properties="['name', 'first_lastname', 'second_lastname', 'phone_number']"
        :actions="['Show', 'Edit','Delete']"
        :action-routes="['client.show', 
                          'client.edit', 
                          'client.destroy'
                        ]"
    />
    
</x-mi-layout>