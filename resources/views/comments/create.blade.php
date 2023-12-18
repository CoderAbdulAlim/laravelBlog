<x-app-layout>
    @auth
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comment Form') }}
        </h2>
        <!-- Back to comments list -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('comments.index') }}">
                Back to comments list
            </a>
        </div>
    </x-slot>
    @endauth

    @auth
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('comments.store', ['post' => $post]) }}" method="POST">
                        @csrf

                        <!-- Post Preview -->
                        <div class="mt-6">
                            {{ 'Comment of :: ' . $post->id . ' # ' .  $post->title}}
                        </div>

                        <!-- Comment -->
                        <div class="mt-6">
                            <x-input-label for="comment" :value="__('Comment')" />
                            <x-textarea-input id="comment" class="block mt-1 w-full" name="comment" :value="old('comment')" required autofocus autocomplete="comment"></x-textarea-input>
                            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                        </div>

                        <!-- Hidden Input for Post ID -->
                        <input type="hidden" name="post_id" value="{{ $post->id }}">

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <x-primary-button type="submit" class="ms-3">
                                {{ __('Submit Comment') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth
</x-app-layout>