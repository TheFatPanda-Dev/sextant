<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Certificates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 text-blue-500 overflow-hidden shadow-xl sm:rounded-lg">

                <h1>Certificate Information</h1>
                @foreach ($links as $link)
                    <div class="mb-4">
                        <h2>{{ $link->link }}</h2>
                        <p>Expiration Date: {{ $link->cert_expiration_date }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
