<x-app-layout>
    <x-slot name="header">
        @auth
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comment Show') }}
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

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $comment->post->name }}</h2>
                        </div>

                        <!-- Post Show START -->
                        <div class="mt-4">
                            <div class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <div class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">

                                    <div class="px-6 py-4 break-words">
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Post Show END -->
                </div>
            </div>
        </div>
    </div>

</x-app-layout>