<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-width-md mx-auto sm:px-6 lg:px-8 bg-gray-200 shadow-md rounded-md">
            <form method="POST" class="p-4" action="{{ route('projects.update', $project->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="name" :value="__('Project Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="$project->name" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="project_url" :value="__('URL')" />
                    <x-text-input id="project_url" class="block mt-1 w-full" type="text" name="project_url"
                        :value="$project->project_url" required />
                    <x-input-error :messages="$errors->get('project_url')" class="mt-2" />
                </div>

                <div class="flex items-center mb-4">
                    <x-input-label for="skills_id" :value="__('Skills')" class="mr-3" />
                    @foreach ($skills as $skill)
                        <div class="mr-2">
                            <input type="checkbox" name="skills[]" value="{{ $skill->id }}"
                                @if (collect($skillCheck)->contains($skill->id)) checked @endif
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label class="s-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                for="{{ $skill->name }}"> {{ $skill->name }}</label><br>
                        </div>
                    @endforeach
                    <x-input-error :messages="$errors->get('skills[]')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="image" :value="__('Upload image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
