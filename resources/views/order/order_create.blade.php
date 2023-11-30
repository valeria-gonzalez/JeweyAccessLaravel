<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Order / " after-span="New Order" />

        <x-forms.horizontal-form title="Create Order" 
                                description="Add a new order"
        > 
            @livewire('multi-step-form', ['method' => 'create']) 
        </x-horizontal-form>
    </div>
</x-mi-layout>