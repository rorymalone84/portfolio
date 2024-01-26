<!--secondary color-->
<div class="bg-light-tertiary py-12 sm:py-12">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">My Skills</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">I use these technologies.</p>
        </div>
        <div
            class="mx-auto mt-6 grid max-w-2xl grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-8 sm:pt-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse ($skills as $skill)
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="relative mt-4 flex items-center gap-x-4">
                        <img src="{{ asset('storage/' . $skill->image) }}" alt=""
                            class="object-contain h-20 w-20 rounded-full">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ $skill->name }}
                                </a>
                            </p>
                        </div>
                    </div>
                </article>
            @empty
                <div class="relative mt-8 flex items-center gap-x-4">
                    <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                No skills have been added yet
                            </a>
                        </p>
                        <p class="text-gray-600">Co-Founder / CTO</p>
                    </div>
                </div>
            @endforelse
            <!-- More posts... -->
        </div>
    </div>
</div>
