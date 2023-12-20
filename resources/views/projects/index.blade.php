<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-end m-2 p-2">
            <x-nav-link-button href="{{ route('projects.create') }}"
                class="px-4 py-2 bg-indigo-600">Create</x-nav-link-button>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-table.HeadersAndBodySlot :headers="['name', 'skill', 'image', 'url']">
                @forelse ($projects as $project)
                    <tbody>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $project->name }}
                            </th>
                            <td class="px-6 py-4">
                                @foreach ($project->skills as $skill)
                                    {{ $skill->name }}
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $project->image) }}" class="w-12 h-12" />
                            </td>
                            <td class="px-6 py-4">
                                {{ $project->project_url }}
                            </td>
                            <td class="px-6 py-4 flex justify-end">
                                <x-nav-link-button href="{{ route('projects.edit', $project->id) }}"
                                    class="mr-3">Edit</x-nav-link-button>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                    <x-nav-link-button href="{{ route('projects.destroy', $project->id) }}"
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
                            <h2 class="px-6 py-4">No projects have been added yet</h2>
                        </tr>
                    </tbody>
                @endforelse
                </table>
            </x-table.headersAndBodySlot>
        </div>
    </div>
</x-app-layout>
