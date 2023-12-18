<x-app-layout>
    <x-slot name="header">
        @auth
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Show') }}
        </h2>
        @endauth
        <!-- Write new post -->
        <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Go back</a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="hover:bg-gray-100 dark:hover:bg-gray-800">
                        <div class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider truncate">

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $post->id . ' # ' . $post->title }}</h2>
                            <div>Category : {{ $post->category->name }}</div>
                            <div>Tag : {{ var_dump($post->tag) }}</div>
                        </div>

                        <!-- Post Show START -->
                        <div class="mt-4">
                            <div class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <div class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">

                                    <div class="px-6 py-4 break-words">
                                        {{ $post->content }}
                                        @auth
                                        <div>
                                            <a href="{{ route('comments.create', $post) }}" class="underline text-sm text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800 mr-3">Write a comment</a>
                                        </div>
                                        @endauth
                                    </div>
                                </div>
                                @if($post->comments)
                                @foreach($post->comments as $comment)
                                <div class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">

                                    <div class="px-6 py-4 break-words">
                                        <strong class="text-green-600 dark:text-green-400 rounded-md">{{ $comment->user->name }} 's Comment ::</strong>
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <p>There is no Post!</p>
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