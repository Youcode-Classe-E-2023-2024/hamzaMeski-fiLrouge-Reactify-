@extends('layout.layout')
@section('content')
    <!-- component -->
    <div class="bg-blue-900 min-h-screen">
        <div class="flex">
            @include('pageComponents.left-side')

            <div class="w-3/5 border border-gray-600 h-auto  border-t-0">
                @include('posts.layout.edit-post-card')
                @include('comments.comment-form')
                @include('comments.comment-box')
                @include('comments.comment-box')
            </div>

            @include('pageComponents.right-side')
            <div/>
        </div>
@endsection
