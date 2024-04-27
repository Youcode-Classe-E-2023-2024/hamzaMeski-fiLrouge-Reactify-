@extends('shared.layout')
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 p-6">
        <div class="p-4 sm:p-8 rounded-lg shadow-2xl md:p-12 bg-gradient-to-br from-gray-900 to-black">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 rounded-lg shadow-2xl md:p-12 bg-gradient-to-br from-gray-900 to-black">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 rounded-lg shadow-2xl md:p-12 bg-gradient-to-br from-gray-900 to-black">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
