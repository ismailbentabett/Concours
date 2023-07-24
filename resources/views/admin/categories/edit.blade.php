@extends('admin.index')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-concgreen-600 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <form class="relative" action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @method('PUT')

                        @csrf


                        <div
                            class="border border-whiterounded-lg shadow-sm overflow-hidden focus-within:border-bittersweet-500 focus-within:ring-1 focus-within:ring-bittersweet-500">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" name="name" id="name" value="{{ $category->name }}"
                                class="bg-concgreen-600 block w-full border-0 pt-2.5 text-lg font-medium placeholder-white focus:ring-0"
                                placeholder="name">
                            <label for="description" class="sr-only">Description</label>
                            <textarea value="{{ $category->description }}" rows="2" name="description" id="description"
                                class="h-40 bg-concgreen-600 block w-full border-0 py-0 resize-none placeholder-white focus:ring-0 sm:text-sm"
                                placeholder="Write description..."></textarea>


                        </div>


                        <div class=" px-2 py-2 flex justify-between items-center space-x-3 sm:px-3">
                            <div class="flex">
                                <button type="button"
                                    class="rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500 cursor pointer">
                                    <label
                                        class="-ml-2 -my-2 rounded-full px-3 py-2 inline-flex items-center text-left text-gray-400 group">
                                        <svg class="-ml-1 h-5 w-5 mr-2 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm text-white group-hover:text-gray-600 italic">Attach a
                                            file</span>
                                        <input type="file" name="image" id="images" class="hidden" />
                                    </label>
                                </button>
                            </div>

                            <div class="images-preview-div">
                            </div>

                            <div class="flex-shrink-0">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-bittersweet-400 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">
                                    Update Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
