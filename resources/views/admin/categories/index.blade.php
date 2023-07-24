@extends('admin.index')

@section('content')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-concgreen-700 shadow sm:rounded-lg mt-5 flex justify-center items-center">
        <div class="px-4 py-5 sm:p-6">

            <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                <a type="button"
                href="{{
                        url('/dashboard/admin/categories/create')
                }}"
                    class="inline-flex items-center px-20 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-bittersweet-700 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-700 sm:text-sm">
                    Add Category
            </a>
            </div>
        </div>
    </div>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-concgreen-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Image
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Submittions
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        @foreach ($categories as $category)
                            <tbody class="bg-concgreen-700 divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                src="{{ asset('storage/' . $category->image) }}"                                                    alt="">
                                            </div>

                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white truncate w-20">
                                            {{ $category->name }}
                                        </div>
                                        <div class="text-sm text-white truncate w-20">{{ $category->description }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            11K
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                </tr>

                                <!-- More people... -->
                            </tbody>
                        @endforeach

                        <div class=" px-4 py-3   sm:px-6 mt-10 bg-concgreen-700">

                            {{ $categories->links('pagination::tailwind') }}
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
