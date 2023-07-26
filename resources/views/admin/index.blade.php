@extends('layouts.dashboard')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="flex items-center justify-center mb-4 rounded bg-gray-50 dark:bg-concgreen-600">
                @yield('content')

            </div>
        </div>
    </div>
@endsection
