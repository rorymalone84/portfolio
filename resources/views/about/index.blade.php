<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>
    <div class="py-12">
        @if ($about)
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('about.edit', $about->id) }}" class="px-4 py-2 bg-indigo-600">Edit</a>
            </div>
        @else
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('about.create') }}" class="px-4 py-2 bg-indigo-600">Create</a>
            </div>
        @endif
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">{{ $about->description }}</div>
        <img src="{{ $about->image }}">
    </div>
</x-app-layout>
