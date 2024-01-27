@extends('layout.layout')
@section('content')
    <!-- component -->
    <div class="bg-blue-900 min-h-screen pt-20 ">
        <div class="flex">

            @include('pageComponents.left-side')

            <div class="w-3/5 border border-gray-600 h-auto  border-t-0">
                <!--middle wall-->
                <div class="flex">
                    <div class="flex-1 m-2">
                        <h2 class="px-4 py-2 text-xl font-semibold text-white">Share Your Ideas</h2>
                    </div>
                </div>
                <hr class="border-gray-600">
                @include('posts.post-form')
                <!--first tweet start-->
                @include('posts.post-card')
            </div>

            @include('pageComponents.right-side')
            <div/>

        </div>
@endsection
