<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('js/turbolinks.js') }}" defer></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            user-select: none;
        }
    </style>
    {{-- tailwind--}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- icons --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="min-h-screen bg-gradient-to-br from-gray-700 to-gray-900">
