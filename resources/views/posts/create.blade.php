<x-app-layout>
    @auth
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Form') }}
        </h2>
        <!-- Back to posts list -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('posts.index') }}">
                Back to posts list
            </a>
        </div>
    </x-slot>
    @endauth

    @auth
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action=" {{ route('posts.store') }}" method="POST">
                        @csrf

                        <!-- Post Title -->
                        <div>
                            <x-input-label for="title" :value="__('Post Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Post Content -->
                        <div class="mt-6">
                            <x-input-label for="content" :value="__('Post Content')" />
                            <x-textarea-input id="content" class="block mt-1 w-full" name="content" :value="old('content')" required autofocus autocomplete="content"></x-textarea-input>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <!-- Post Type -->
                        <div class="mt-6">
                            <x-input-label for="type" :value="__('Post Type')" />
                            <x-select-input id="type" class="block mt-1 w-full" name="type" :disabled="false">
                                <option value="">Select Post Type</option>
                                <option value="page-post">Page Post</option>
                                <option value="blog-post">Blog Post</option>
                            </x-select-input>
                            <x-input-error :messages="$errors->get('type')" class="mt-2" />
                        </div>

                        <!-- Post Category -->
                        <div class="mt-6">
                            <x-input-label for="category" :value="__('Post Category')" />
                            <x-select-input id="category" class="block mt-1 w-full" name="category" :disabled="false">
                                <option value="">Select Category</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                            </x-select-input>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Post Author -->

                        <!-- Post Publish -->
                        <div class="mt-6">
                            <x-input-label for="publish" :value="__('Post Publish')" />
                            <x-select-input id="publish" class="block mt-1 w-full" name="publish" :disabled="false">
                                <option value="">Select Publish Option</option>
                                <option value="draft">Save as Draft</option>
                                <option value="private">Private Post</option>
                                <option value="public">Public Post</option>
                            </x-select-input>
                            <x-input-error :messages="$errors->get('publish')" class="mt-2" />
                        </div>

                        <!-- Comment Allow -->
                        <div class="mt-6">
                            <x-input-label for="comment" :value="__('Comment Allow')" />
                            <x-select-input id="comment" class="block mt-1 w-full" name="comment" :disabled="false">
                                <option value="">Select Comment Option</option>
                                <option value="restricted">Restricted</option>
                                <option value="private">Private</option>
                                <option value="public">Public</option>
                            </x-select-input>
                            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <x-primary-button type="submit" class="ms-3">
                                {{ __('Save Post') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth
</x-app-layout>