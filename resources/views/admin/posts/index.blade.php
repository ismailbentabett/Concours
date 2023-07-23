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
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                  Likes
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                  Role
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
                        @if ($post->$user->avatar)
                        <img src="{{ asset('storage/' . $post->images[0]) }}"
                            class="h-10 w-10 rounded-full" alt="" />
                    @else
                        <img class="h-10 w-10 rounded-full"
                            src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                            alt="" />
                    @endif                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
               {{
                $post->title
               }}
                      </div>
                      <div class="text-sm text-white">
                 {{$post->content}}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">11K</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Active
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                  User
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="#" class="text-red-600 hover:text-indigo-900">Delete</a>
                </td>
              </tr>
                @endforeach

              <!-- More people... -->
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
