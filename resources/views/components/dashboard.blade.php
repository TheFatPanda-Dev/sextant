<div class="space-y-4">
    <div
        class="block p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <form action="{{ route('webpages_links.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="webpage_link" class="sr-only">Webpage Link</label>
                <input type="text" name="webpage_link" id="webpage_link" placeholder="Enter webpage link"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('webpage_link') border-red-500 @enderror"
                    value="{{ old('webpage_link') }}">

                @error('webpage_link')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                @if (session('success'))
                    <div id="message" class="mt-4 text-green-500 text-sm">
                        {{ session('success') }}
                    </div>
                @elseif (session('info'))
                    <div id="message" class="mt-4 text-red-500 text-sm">
                        {{ session('info') }}
                    </div>
                @endif
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add
                    Link</button>
            </div>
        </form>
    </div>

    <div id='list-wepages-links'
        class="block p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        @livewire('webpages-links-component')
    </div>

</div>
