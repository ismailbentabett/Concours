
@extends('user.index')

@section('content')

@foreach ($posts as $post)
    <!-- Display post details -->
   <x-post :post="$post" :user="$user" />
@endforeach

<!-- Display pagination links -->
<div class=" px-4 py-3  border-t border-gray-200 sm:px-6 mt-10">

{{ $posts->links('pagination::tailwind') }}
</div>
@endsection
