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
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">{{ $about->description }}</div>
            <img src="{{ $about->image }}">
        @else
            <h2 class="px-6 py-4">No about me sction has been created yet</h2>
        @endif
    </div>
</x-app-layout>
