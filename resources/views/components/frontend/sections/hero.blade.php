<a id="hero">
    <div
        class="bg-light-hero-image dark:bg-dark-hero-image w-full
relative
overflow-hidden
block
z-10

bg-cover
bg-no-repeat
bg-center

before:content-['']
before:absolute
before:inset-0
before:block
before:bg-gradient-to-r
before:from-white
before:to-blue-300
before:opacity-75
before:z-[-5]">
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-6/12 sm:w-4/12 p-4">
                            @if ($about)
                                <img src="https://rm-portfolio-images.s3.eu-north-1.amazonaws.com/rm-portfolio-images/{{ $about->image }}"
                                    alt="..."
                                    class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                            @else
                                <p class="mt-6 text-lg leading-8 text-gray-800">The portfolio owner hasn't added an
                                    image yet</p>
                            @endif
                        </div>
                    </div>

                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Welcome</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-800">You have reached the web development portfolio of
                        Rory
                        Malone.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="https://github.com/rorymalone84">
                            <img src="images/github-mark-white.png" alt="github.com/rorymalone84"
                                class="w-10 h-10 bg-dark-primary  dark:bg-light-primary rounded-full" />
                        </a>
                        <a href="mailto:rorymalone@live.com"
                            class="text-sm font-semibold leading-6 text-gray-900">E-mail me
                            <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
