<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Order / " after-span="Edit Order" />

        <x-forms.horizontal-form title="Edit Order" description="Edit an order">
            @livewire('multi-step-form', ['method' => 'edit', 'order' => $order])
        </x-horizontal-form>
    </div>
</x-mi-layout>