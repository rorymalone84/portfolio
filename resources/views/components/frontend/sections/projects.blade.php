<section>
    <div class="bg-light-quaternary py-12 sm:py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-6">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl text-white">My Projects</h2>
                <p class="mt-2 mb-4 text-lg leading-8 text-white py-2">I created these projects.</p>
            </div>
            @forelse ($projects as $project)
                <div
                    class="max-w-sm relative isolate overflow-hidden bg-gradient-to-r from-light-secondary via-gray-200 to-light-secondary py-12 sm:py-12 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg"
                            src="https://rm-portfolio-images.s3.eu-north-1.amazonaws.com/rm-portfolio-images/{{ $project->image }}"
                            alt="{{ $project->name }}" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $project->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Technologies used
                            @forelse($project->skills as $skill)
                                <ul class="list-disc pl-4">
                                    <li>{{ $skill->name }}</li>
                                </ul>
                            @empty
                            @endforelse
                        </p>
                        <a href="{{ $project->url }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-8">
                            Repository
                        </a>
                    </div>
                </div>
            @empty
                <p class="mt-2 mb-4 text-lg leading-8 text-gray-600 py-2">No projects have been added yet.</p>
            @endforelse
        </div>
    </div>
</section>
