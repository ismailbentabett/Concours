@extends('admin.index')

@section('content')
    <header class="">
        <div class="max-w-7xl mx-auto py-7 px-4 sm:px-6 lg:px-8">
        </div>
    </header>
    <header class="bg-white dark:bg-concgreen-700 shadow hadow rounded-lg">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Inbox
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
                                    Nom & Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Téléphone
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Sujet
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Message
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-concgreen-700 divide-y divide-gray-200">
                            @foreach ($messages as $message)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">
                                                    {{ $message->firstName }}
                                                    {{ $message->lastName }}
                                                </div>
                                                <div class="text-sm text-white">
                                                    {{ $message->email }} </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white"> {{ $message->phone }} </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white truncate w-20">
                                        {{ $message->subject }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white truncate w-20">
                                        {{ $message->message }}
                                    </td>
                                    <td
                                        class="px-6 py-6 whitespace-nowrap text-right text-sm font-medium flex justify-center items-center space-x-5">
                                        <form action="{{ route('admin.inbox.destroy', $message->id) }}" method="POST"
                                            class="text-red-600 hover:text-red-900">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Supprimer</button>
                                        </form>

                                        <a href="{{ url('/dashboard/admin/inbox/' . $message->id) }}"
                                            class="text-cyan-500 hover:text-white">Voir</a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <div class=" px-4 py-3   sm:px-6 mt-10 bg-concgreen-700">

                            {{ $messages->links('pagination::tailwind') }}
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
