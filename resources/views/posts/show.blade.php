<x-app-layout>
    <x-slot name="header">
        @auth
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Show') }}
        </h2>
        @endauth
        <!-- Write new post -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('home') }}">
                Back to home page
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="hover:bg-gray-100 dark:hover:bg-gray-800">
                        <div class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider truncate">

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $post->title }}</h2>
                        </div>

                        <!-- Post Show START -->
                        <div class="mt-4">
                            <div class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <div class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">

                                    <div class="px-6 py-4 break-words">
                                        {{ $post->content }}
                                    </div>
                                </div>
                                @if($post->comments)
                                @foreach($post->comments as $comment)
                                <div class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">

                                    <div class="px-6 py-4 break-words">
                                        <strong class="text-green-600 dark:text-green-400 rounded-md">Comment : </strong>
                                        {{ $comment->comment }}
                                        <p class="text-green-600 dark:text-green-400 rounded-md">Comment by : {{ $comment->user->name }}</p>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <p>There is not Comment!</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <!-- Post Show END -->
                </div>
            </div>
        </div>
    </div>

</x-app-layout>