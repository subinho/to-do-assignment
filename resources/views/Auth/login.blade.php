<x-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900">Log in</h2>
    </div>

    <form method="POST" action="/login" >
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
{{--                <div class="flex flex-col items-center justify-center w-full">--}}
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 items-center mx-auto">


                        <x-form-field>
                            <x-form-label for="email">Email</x-form-label>

                            <div class="mt-2">
                                <x-form-input name="email" id="email" type="email" :value="old('email')" required />

                                <x-form-error name="email" />
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="password">Password</x-form-label>

                            <div class="mt-2">
                                <x-form-input name="password" id="password" type="password" required />

                                <x-form-error name="password" />
                            </div>
                        </x-form-field>

                    </div>
                    <div class="flex justify-end text-sm">
                        <span>Are you new here ? <a href="/register" class="text-violet-600 font-semibold">Register</a></span>
                    </div>
{{--                </div>--}}
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Log in</x-form-button>
        </div>
    </form>
</x-layout>
