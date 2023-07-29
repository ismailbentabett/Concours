@extends('admin.index')

@section('content')
    <header class="">
        <div class="max-w-7xl mx-auto py-7 px-4 sm:px-6 lg:px-8">
        </div>
    </header>
    <header class="bg-white dark:bg-concgreen-700 shadow hadow rounded-lg">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Candidats
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
                                    Nom
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Likes
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Rôle
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-concgreen-700 divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('visituser.concours', ['id' => $user->id]) }}"
                                            class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if ($user->avatar)
                                                    <img src="{{ asset('storage/' . $user->avatar) }}"
                                                        class="h-10 w-10 rounded-full" alt="" />
                                                @else
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                                                        alt="" />
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">
                                                    {{ $user->name }}
                                                </div>
                                                <div class="text-sm text-white">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white">{{ $user->postslikes + $user->concourslikes }}</div>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                        @if ($user->isAdmin())
                                            Admin,
                                        @endif
                                        @if ($user->isUser())
                                            User,
                                        @endif
                                        @if ($user->isCandidat())
                                            Candidat
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        @if (!$user->isAdmin())
                                            <a href="#" class="text-red-600 hover:text-indigo-900">

                                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Supprimer</button>
                                                </form>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach


                            <div class=" px-4 py-3   sm:px-6 mt-10 bg-concgreen-700">

                                {{ $users->links('pagination::tailwind') }}
                            </div>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
