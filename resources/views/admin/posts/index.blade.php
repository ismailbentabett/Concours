@extends('admin.index')

@section('content')
    <header class="">
        <div class="max-w-7xl mx-auto py-7 px-4 sm:px-6 lg:px-8">
        </div>
    </header>
    <header class="bg-white dark:bg-concgreen-700 shadow hadow rounded-lg">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Posts
            </h2>
        </div>
    </header>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-concgreen-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Posts
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    UTILISATEURS
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Likes
                                </th>


                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-concgreen-700 divide-y divide-gray-200">
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if ($post->images->count() > 0)
                                                    <img src="{{ asset('storage/' . $post->images[0]) }}"
                                                        class="h-10 w-10 rounded-full" alt="" />
                                                @else
                                                    <img class="h-10 w-10 rounded-sm"
                                                        src="{{ URL('image/postplaceholder.png') }}" alt="1"
                                                        alt="" />
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">
                                                    {{ $post->title }}
                                                </div>
                                                <div class="text-sm text-white">
                                                    {{ $post->content }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="ml-4">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    @if ($post->user->avatar)
                                                        <img src="{{ asset('storage/' . $post->user->avatar) }}"
                                                            class="h-10 w-10 rounded-full" alt="" />
                                                    @else
                                                        <img class="h-10 w-10 rounded-full"
                                                            src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                                                            alt="" />
                                                    @endif
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-white">
                                                        {{ $post->user->name }}
                                                    </div>
                                                    <div class="text-sm text-white">
                                                        {{ $post->user->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white">{{ $post->likes->count() }}</div>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                        <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-indigo-900">Supprimer
                                            </button>
                                        </form>
                                    </td>
                            @endforeach


                        </tbody>

                        <div class=" px-4 py-3   sm:px-6 mt-10 bg-concgreen-700">

                            {{ $posts->links('pagination::tailwind') }}
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
