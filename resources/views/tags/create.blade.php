<x-app-layout>
    @auth
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tag Form') }}
        </h2>
        <!-- Back to tags list -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('tags.index') }}">
                Back to tags list
            </a>
        </div>
    </x-slot>
    @endauth

    @auth
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action=" {{ route('tags.store') }}" method="POST">
                        @csrf

                        <!-- Tag Name -->
                        <div>
                            <x-input-label for="name" :value="__('Tag Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Tag Description -->
                        <div class="mt-6">
                            <x-input-label for="description" :value="__('Tag Description')" />
                            <x-textarea-input id="description" class="block mt-1 w-full" name="description" :value="old('description')" required autofocus autocomplete="description"></x-textarea-input>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <x-primary-button type="submit" class="ms-3">
                                {{ __('Add Tag') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth
</x-app-layout>