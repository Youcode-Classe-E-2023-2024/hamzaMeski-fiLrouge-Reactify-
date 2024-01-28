@extends('layout.layout')
@section('content')
    <!-- component -->
    <div class="bg-blue-900 min-h-screen">
        <div class="flex">
            @include('pageComponents.left-side')

            <div class="w-3/5 border border-gray-600 h-auto  border-t-0">
                @include('posts.layout.post-card')
                @include('comments.comment-form')

                @forelse($post->comments as $comment)
                    @include('comments.comment-box')
                @empty
                    <div class="font-bold text-white">No Comment yet</div>
                @endforelse

            </div>

            @include('pageComponents.right-side')
            <div/>
        </div>
@endsection
