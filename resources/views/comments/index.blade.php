<x-app-layout>
    @auth
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comment List') }}
        </h2>
        <!-- Write new comments -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('comments.create') }}">
                Write a new comment
            </a>
        </div>
    </x-slot>
    @endauth

    @auth
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Comments") }}

                    <!-- Post table END -->
                    <div class="mt-4">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Post Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Comment
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Commentor
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                <!-- Show Post List -->
                                @if($comments->count())
                                @foreach($comments as $comment)
                                <!-- Dynamic Table rows START-->
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $comment->post->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $comment->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="" class="font-medium">{{ $comment->user->name }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($comment->user_id == auth()->id())
                                        <div class="flex items-center">
                                            <a href="#" class="underline text-sm text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800 mr-3">Show</a>
                                            <a href="#" class="underline text-sm text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 mr-3">Edit</a>
                                            <a href="#" class="underline text-sm text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800">Delete</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p>There are no data!</p>
                                @endif
                                <!-- Dynamic Table rows END -->
                            </tbody>
                        </table>
                        <div class="mt-6">
                            {{ $comments->links() }}
                        </div>
                    </div>
                    <!-- Post table END -->
                </div>
            </div>
        </div>
    </div>
    @endauth
</x-app-layout>