<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to our laravel blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Post table START -->
                    <div class="mt-4">
                        <div class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <div class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                <!-- Show Post List -->
                                @if($posts->count())
                                @foreach($posts as $post)
                                <!-- Dynamic Div rows START-->
                                <div class="hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <div class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider truncate">
                                        
                                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $post->title }}</h2>
                                    </div>
                                    <div class="px-6 py-4 break-words">
                                        <p>
                                            {{ $post->first50Words }}
                                            <a href="{{ route('posts.show', $post) }}" onclick="" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800">Read more...</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- Dynamic Div rows END -->
                                @endforeach
                                @else
                                <p>There are no data!</p>
                                @endif
                            </div>
                        </div>
                        <div class="mt-6">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    <!-- Post table END -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>