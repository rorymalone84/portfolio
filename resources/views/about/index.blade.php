<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>
    <div class="py-12">
        @if ($about)
            <div class="flex justify-end m-2 p-2">
                <x-nav-link-button href="{{ route('about.edit', $about->id) }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</x-nav-link-button>
            </div>
        @else
            <div class="flex justify-end m-2 p-2">
                <x-nav-link-button href="{{ route('about.create') }}" class="bg-green-500">Create</x-nav-link-button>
            </div>
        @endif
        @if ($about)
            <div class="max-width-md mx-auto sm:px-6 lg:px-8 bg-gray-200 shadow-md rounded-md">
                <div
                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <h1 class="text-align-center p-10">{{ $about->description }}</h1>
                    <img src="{{ asset('storage/' . $about->image) }}" class="object-scale-down h-48 w-96">
                </div>
            @else
                <h2 class="px-6 py-4">No about me section has been created yet</h2>
            </div>
        @endif
    </div>
</x-app-layout>
