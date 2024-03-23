@extends('shared.layout')

@section('content')
    <section class="h-[88vh] flex">
        <div class="w-[280px] pl-28 flex flex-col justify-between py-6 border-r-[1px] border-solid border-gray-500">
            <ul class="">
                <li>
                    <a href="" class="side_item flex items-center gap-1 px-4 py-1">
                        <ion-icon name="home"></ion-icon>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="" class="side_item flex items-center gap-1 px-4 py-1">
                        <ion-icon name="cloud-download"></ion-icon>
                        <span>Questions</span>
                    </a>
                </li>
                <li>
                    <a href="" class="side_item flex items-center gap-1 px-4 py-1">
                        <ion-icon name="pricetags"></ion-icon>
                        <span>Tags</span>
                    </a>
                </li>
            </ul>
            <ul class="flex flex-col gap-2">
                <li>
                    <a href="" class="side_item inline-block flex items-center gap-1 px-4 py-1">
                        <ion-icon name="bookmark"></ion-icon>
                        <span>Saves</span>
                    </a>
                </li>
                <li>
                    <a href="" class="side_item flex items-center gap-1 px-4 py-1">
                        <ion-icon name="people"></ion-icon>
                        <span>Users</span>
                    </a>
                </li>
                <li class="px-4 py-1">
                    <ion-icon name="business"></ion-icon>
                    <span>Companies</span>
                </li>
            </ul>
            <ul class="flex flex-col gap-2">
                <li class="flex items-center gap-20 text-gray-700 px-4 py-1">
                    <span>Labs</span>
                    <ion-icon name="information-circle"></ion-icon>
                </li>
                <li>
                    <a href="" class="side_item flex items-center gap-1 px-4 py-1">
                        <ion-icon name="chatbubbles"></ion-icon>
                        <span>Descussions</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="px-4 py-1">
                    <span>Collectives</span>
                    <ion-icon name="add"></ion-icon>
                </li>
                <li class="px-4 py-1 text-[12px]">Communities for your favorite technologies.</li>
                <li class="px-4 py-1">Explore all collectives</li>
            </ul>
        </div>
        <main></main>
    </section>
@endsection
