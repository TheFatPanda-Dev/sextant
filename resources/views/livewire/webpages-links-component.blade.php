<div>
    @foreach ($links as $link)
        <div class="mb-2 flex justify-between items-center">
            <a href="{{ $link->link }}" target="_blank" class="text-blue-500">{{ $link->link }}</a>
            <button wire:click="confirmDelete({{ $link->id }})"
                class="bg-red-500 text-white px-4 py-1 rounded font-medium">Delete</button>
        </div>
    @endforeach

    <x-confirmation-modal wire:model="confirmingLinkDeletion">
        <x-slot name="title">
            Delete Link
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete this link?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingLinkDeletion', false)">
                No
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="deleteLink">
                Yes
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
