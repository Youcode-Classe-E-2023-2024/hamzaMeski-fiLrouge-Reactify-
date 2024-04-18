@extends('shared.layout')

@section('content')
    <section id="QA-page-container" class="flex gap-2 relative">
        <main class="h-full w-full overflow-auto">
            @yield('main-content')
        </main>
    </section>

@endsection
