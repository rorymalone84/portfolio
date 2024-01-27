<section>
    <div
        class="relative isolate overflow-hidden bg-gradient-to-r from-light-secondary via-gray-200 to-light-secondary py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl text-gray-900">Contact Me</h2>
                <p class="mt-2 mb-4 text-lg leading-8 text-gray-800 py-2">Leave a message below for any enquiries.</p>
            </div>
        </div>

        <form action="{{ route('email.contact') }}" method="POST">
            @csrf
            <div class="px-8 lg:px-8p-4 sm:w-full md:w-1/2 rounded">
                <div class="mx-auto max-w-2xl lg:mx-0 mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 sm:w-full md:w-1/3" type="text" name="name"
                        :value="old('name')" required autocomplete="Enter your name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mx-auto max-w-2xl lg:mx-0 mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 sm:w-full md:w-1/3" type="email" name="email"
                        :value="old('email')" required autocomplete="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Message</label>
                    <textarea id="body" rows="4" name="body"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                </div>
                <button type="submit"
                    class="btn btn-md bg-blue-600 hover:bg-blue-300 text-slate-200 hover:text-gray-800 mt-4 rounded-2xl">Send</button>
            </div>
        </form>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <p class="mt-2 mb-4 text-lg leading-8 text-gray-800 py-2">Or E-mail directly:
                    <a href="{{ $contact->email }}" class="text-blue-800">{{ $contact->email }}
                    </a>
                </p>
                <p class="mt-2 mb-4 text-lg leading-8 text-gray-800 py-2"><!-- phone no --></p>
            </div>
        </div>
    </div>
</section>
