@extends('admin.index')

@section('content')
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Submittion
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  User
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Likes
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Category
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($concours as $concour)

              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        @if ($concour->image)
                        <img src="{{ asset('storage/' . $concour->image) }}"
                            class="h-10 w-10 rounded-md" alt="" />
                    @else
                        <img class="h-10 w-10 rounded-md"
                            src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                            alt="" />
                    @endif                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{
                            $concour->profession
                        }}
                      </div>
                      <div class="text-sm text-gray-500">
                        <time datetime="2020-12-09T11:43:00">{{ $concour->created_at }}</time>

                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="ml-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                @if ($concour->user->avatar)
                                <img src="{{ asset('storage/' . $concour->user->avatar) }}"
                                    class="h-10 w-10 rounded-full" alt="" />
                            @else
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                                    alt="" />
                            @endif                    </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{
                                    $concour->user->name
                                }}
                              </div>
                              <div class="text-sm text-gray-500">
                                {{
                                    $concour->user->email
                                }}
                              </div>
                            </div>
                          </div>
                      </div>                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    11K
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-500">
                        {{
                            $concour->category->name
                        }}
                      </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="#" class="text-red-600 hover:text-indigo-900">Delete</a>
                </td>
              </tr>
                @endforeach

              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
