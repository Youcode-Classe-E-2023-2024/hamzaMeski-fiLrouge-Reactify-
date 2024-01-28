@extends('layout.layout')
@section('content')
    <!-- component -->
    <div class="bg-blue-900 min-h-screen">
        <div class="flex">
            @include('pageComponents.left-side')

            <div class="w-3/5 border border-gray-600 h-auto  border-t-0">
                @if($editing ?? null)
                    @include('users.layout.edit-profile-card')
                @else
                    @include('users.layout.profile-card')
                @endif
            </div>

            @include('pageComponents.right-side')
            <div/>
        </div>
@endsection
