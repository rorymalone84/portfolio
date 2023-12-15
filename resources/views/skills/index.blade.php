<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Skills') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('skills.create') }}" class="px-4 py-2 bg-indigo-600">Create</a>
        </div>
        <div class="relative
                overflow-x-auto shadow-md sm:rounded-lg">
            <x-table.HeadersAndBodySlot :headers="['name', 'image', 'action']">
                @forelse($skills as $skill)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $skill->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $skill->image }}
                        </td>
                        <td class="px-6 py-4">
                            <a href=""
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
