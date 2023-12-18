<x-app-layout>
    @auth
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tag List') }}
        </h2>
        <!-- Create new tag -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('tags.create') }}">
                Create a new tag
            </a>
        </div>
    </x-slot>
    @endauth

    @auth
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Tags") }}

                    <!-- Post table END -->
                    <div class="mt-4">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Post Under Tag
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                <!-- Show Post List -->
                                @if($tags->count())
                                @foreach($tags as $tag)
                                <!-- Dynamic Table rows START-->
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $tag->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap max-w-xs overflow-x-hidden">
                                        {{ $tag->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-wrap max-w-xs overflow-x-hidden">
                                            <a href="{{ route('tags.tag.posts', ['tag' => $tag->id]) }}" class="underline text-sm text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800 mr-3">Show all post under this tag</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <a href="{{ route('tags.show', $tag) }}" class="underline text-sm text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800 mr-3">Show</a>
                                            <a href="#" class="underline text-sm text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 mr-3">Edit</a>

                                            <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800">Delete</button>
                                            </form>
                                        </div>
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
                            {{ $tags->links() }}
                        </div>
                    </div>
                    <!-- Post table END -->
                </div>
            </div>
        </div>
    </div>
    @endauth
</x-app-layout>