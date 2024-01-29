<section>
    <div
        class="relative isolate overflow-hidden bg-gradient-to-r from-light-secondary via-gray-200 to-light-secondary py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl text-gray-900">Contact Me</h2>
                <p class="mt-2 mb-4 text-lg leading-8 text-gray-800 py-2">Leave a message below for any enquiries.</p>
            </div>
        </div>

        <form x-data="contactForm" @submit.prevent="submitForm">
            @csrf
            <div class="px-8 lg:px-8p-4 sm:w-full md:w-1/2 rounded">
                <div class="mx-auto max-w-2xl lg:mx-0 mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 sm:w-full md:w-1/3" type="text" name="name"
                        x-model="formData.name" :value="old('name')" required autocomplete="Enter your name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mx-auto max-w-2xl lg:mx-0 mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 sm:w-full md:w-1/3" type="email" name="email"
                        x-model="formData.email" :value="old('email')" required autocomplete="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- success message if message got sent -->
                <div x-text="formMessage" x-show="formShow" x-if="formShow, setTimeout(() => formShow = false, 10000)"
                    x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-2000"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="p-4 mb-4 text-sm text-green-50 rounded-lg bg-green-700 dark:bg-gray-100 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">Success alert!</span>
                </div>
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Message</label>
                    <textarea id="body" rows="4" name="body" x-model="formData.body"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                </div>
                <button :disabled="formLoading" x-text="buttonText"
                    class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"></button>
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

<script>
    function contactForm() {
        return {
            formData: {
                name: "",
                email: "",
                body: "",
            },
            formShow: false,
            formMessage: "",
            formLoading: false,
            buttonText: "Submit",
            submitForm() {
                this.formMessage = "";
                fetch('/contact/submit', {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content,
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                        body: JSON.stringify(this.formData),
                    })
                    .then(() => {
                        this.formData.name = "";
                        this.formData.email = "";
                        this.formData.body = "";
                        this.formShow = true;
                        this.formMessage = "Message sent.";
                        console.log("Form successfully submitted.");
                    })
                    .catch(() => {
                        this.formMessage = "Something went wrong.";
                        console.log("Something went wrong.");
                    });
            },
        };
    }
</script>
