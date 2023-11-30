<x-mi-layout>
    @include('sweetalert::alert')
    <div class="container-fluid flex-grow-1 container-p-y">
    <x-text.page-heading1 span="Client / " after-span="List Clients"/> 

    <x-table.hoverable-table 
        title="All Clients"
        :headings="['Id', 'Full Name', 'Created By']"
        :models="$clients"
        :properties="['id', 'full_name', 'user']"
        :actions="['Show', 'Edit','Delete']"
        :action-routes="['client.show', 
                          'client.edit', 
                          'client.destroy'
                        ]"
    />
    </div>
</x-mi-layout>