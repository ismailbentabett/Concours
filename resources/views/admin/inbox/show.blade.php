@extends('admin.index')

@section('content')
    <!-- Bottom section -->
    <div class="min-h-0 flex-1 flex overflow-hidden mt-10">
        <!-- Narrow sidebar-->


        <!-- Main area -->
        <main class="min-w-0 flex-1 xl:flex">
            <section aria-labelledby="message-heading"
                class="min-w-0 flex-1 h-full flex flex-col overflow-hidden xl:order-last">


                <div class="min-h-0 flex-1 overflow-y-auto">
                    <div class="bg-concgreen-700 pt-5 pb-6 shadow">
                        <div class="px-4 sm:flex sm:justify-between sm:items-baseline sm:px-6 lg:px-8">
                            <div class="sm:w-0 sm:flex-1">
                                <h1 id="message-heading" class="text-lg font-medium text-white">
                                    Sujet : {{ $message->subject }}
                                </h1>
                                <p class="mt-1 text-sm text-white truncate">
                                    {{ $message->email }}
                                </p>
                            </div>

                            <div
                                class="mt-4 flex items-center justify-between sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:justify-start">
                                <span
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-bittersweet-100 text-bittersweet-800">
                                    Ouvert
                                </span>
                                <div class="ml-3 relative inline-block text-left">



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Thread section-->
                    <ul role="list" class="py-4 space-y-2 sm:px-6 sm:space-y-4 lg:px-8">



                        <li class="bg-concgreen-700 px-4 py-6 shadow sm:rounded-lg sm:px-6">
                            <div class="sm:flex sm:justify-between sm:items-baseline">
                                <h3 class="text-base font-medium">
                                    <span class="text-white">{{ $message->firstName }}
                                        {{ ' ' }}
                                        {{ $message->lastName }}
                                    </span>
                                    <span class="text-white">écrit</span>
                                </h3>
                                <p class="mt-1 text-sm text-white whitespace-nowrap sm:mt-0 sm:ml-3">


                                    <time datetime="2020-12-09T11:43:00">{{ $message->created_at }}</time>

                                </p>
                            </div>
                            <div class="mt-4 space-y-6 text-sm text-white">
                                {{ $message->message }}
                                <p>– {{ $message->firstName }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Message list-->

        </main>
    </div>
    </div>
@endsection
