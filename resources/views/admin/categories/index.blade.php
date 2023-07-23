@extends('admin.index')

@section('content')
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-concgreen-700">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                  Image
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
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
                      <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                    </div>

                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-white truncate w-20">
                    {{
                        $category->name
                    }}
                  </div>
                  <div class="text-sm text-white truncate w-20">{{
                    $category->description
                    }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
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
