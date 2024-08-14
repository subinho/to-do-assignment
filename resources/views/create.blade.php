<x-layout>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create new task</h2>
        </div>

        <form method="POST" action="/">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <x-form-field>
                            <x-form-label for="title">Title</x-form-label>

                            <div class="mt-2">
                                <x-form-input name="title" id="title" placeholder="Title" />

                                <x-form-error name="title" />
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="body">Body</x-form-label>

                            <div class="mt-2">
{{--                                <x-form-input name="body" id="body" placeholder="Description" />--}}
                                <x-form-textarea id="body" name="body" placeholder="Description" rows="10"></x-form-textarea>
                                <x-form-error name="body" />
                            </div>
                        </x-form-field>
                    </div>
                    <p class="text-red-500 mt-8 text-sm">Time to complete the task  is 24 hours</p>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <x-form-button>Save</x-form-button>
            </div>
        </form>

</x-layout>
