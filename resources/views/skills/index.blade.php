<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Skills') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="flex justify-end m-2 p-2">
            <x-nav-link-button href="{{ route('skills.create') }}"
                class="px-4 py-2 bg-indigo-600">Create</x-nav-link-button>
        </div>
        <div class="relative
                overflow-x-auto shadow-md sm:rounded-lg">
            <x-table.HeadersAndBodySlot :headers="['name', 'image']">
                @forelse($skills as $skill)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $skill->name }}
                        </th>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}"
                                class="w-12 h-12">
                        </td>
                        <td class="px-6 py-4 flex justify-end">
                            <x-nav-link-button href="{{ route('skills.edit', $skill->id) }}"
                                class="mr-3">Edit</x-nav-link-button>
                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                                <x-nav-link-button href="{{ route('skills.destroy', $skill->id) }}"
                                    class="bg-red-500 text-gray-300"
                                    onclick="event.preventDefault(); this.closest('form').submit()">
                                    @csrf
                                    @method('DELETE')
                                    Delete</x-nav-link-button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <h2 class="px-6 py-4">No Skills have been added yet</h2>
                    </tr>
                @endforelse
            </x-table.HeadersAndBodySlot>
        </div>
    </div>
</x-app-layout>
