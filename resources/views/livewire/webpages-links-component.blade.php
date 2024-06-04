<div>
    @foreach($links as $link)
        <div class="mb-2 flex justify-between items-center"">
            <a href="{{ $link->link }}" target="_blank" class="text-blue-500">{{ $link->link }}</a>
            <button wire:click="delete({{ $link->id }})"
                class="bg-red-500 text-white px-4 py-1 rounded font-medium">Delete</button>
        </div>
    @endforeach
</div>
