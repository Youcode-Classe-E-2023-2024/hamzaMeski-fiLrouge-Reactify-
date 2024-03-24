@extends('shared.layout')

@section('content')
    <section class="h-[88vh] flex">
        <div class="w-[280px] pl-28 flex flex-col justify-between py-6 border-r-[1px] border-solid border-gray-500">
            <ul class="">
                <li>
                    <a href="#" class="side_item flex items-center gap-1 px-4 py-1">
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
        <main class=" h-full w-full overflow-auto grid grid-cols-5 gap-6">

            @yield('main-content')

            {{-- blogs Sections, top hot questions & related tags Section start --}}
                <div class="col-span-2 h-full mt-6 mr-20">
                    {{-- blogs start --}}
                        <div class=" border-[1px] border-[#fe3f40] border-solid text-[14px]">
                            <p class="border-b-[1px] border-[#fe3f40] border-solid font-bold p-2 bg-[#fe3f40] text-white">The reactify blog</p>
                            <ul class="px-4 py-2">
                                <li>
                                    <a href="" class="flex items-center gap-1">
                                        <ion-icon name="create"></ion-icon>
                                        <span>Why the creator of Node.js® created a new JavaScript runtime</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="flex items-center gap-1">
                                        <ion-icon name="create"></ion-icon>
                                        <span>Is AI making your code worse?</span>
                                    </a>
                                </li>
                            </ul>
                            <p class="border-b-[1px] border-[#fe3f40] border-solid font-bold p-2 bg-[#fe3f40] text-white">Featured</p>
                            <ul class="px-4 py-2">
                                <li>
                                    <a href="" class="flex items-center gap-1">
                                        <ion-icon name="create"></ion-icon>
                                        <span>Why the creator of Node.js® created a new JavaScript runtime</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="flex items-center gap-1">
                                        <ion-icon name="create"></ion-icon>
                                        <span>Why the creator of Node.js® created a new JavaScript runtime</span>
                                    </a>
                                </li>
                            </ul>
                            <p class="border-b-[1px] border-[#fe3f40] border-solid font-bold p-2 bg-[#fe3f40] text-white">Hot Meta Posts</p>
                            <ul class="px-4 py-2">
                                <li>
                                    <a href="" class="flex items-center gap-1">
                                        <ion-icon name="create"></ion-icon>
                                        <span>Why the creator of Node.js® created a new JavaScript runtime</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="flex items-center gap-1">
                                        <ion-icon name="create"></ion-icon>
                                        <span>Why the creator of Node.js® created a new JavaScript runtime</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    {{-- blogs end --}}

                    {{-- related tags start --}}
                        <div>
                            <h1 class="text-2xl mt-10">Related Tags</h1>
                            <ul class="flex flex-col justify-center gap-2">
                                <li class="flex gap-1">
                                    <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">android</a>
                                    <span class="text-[12px]">x 45222</span>
                                </li>
                                <li class="flex gap-1">
                                    <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">kotlin</a>
                                    <span class="text-[12px]">x 45222</span>
                                </li>
                                <li class="flex gap-1">
                                    <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">swift</a>
                                    <span class="text-[12px]">x 45222</span>
                                </li>
                                <li class="flex gap-1">
                                    <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">user-interface</a>
                                    <span class="text-[12px]">x 4222</span>
                                </li>
                            </ul>
                        </div>
                    {{-- related tags end --}}

                    {{-- hot questions start --}}
                    <div>
                        <h1 class="text-2xl mt-10">Top Hot Questions</h1>
                        <ul class="flex flex-col justify-center gap-2">
                            <li class="flex gap-1">
                                <a href="" class="text-[14px] text-blue-500">The word *X* means Y: Should Y be in italics, quotes, or neither?</a>
                            </li>
                            <li class="flex gap-1">
                                <a href="" class="text-[14px] text-blue-500">The word *X* means Y: Should Y be in italics, quotes, or neither?</a>
                            </li>
                            <li class="flex gap-1">
                                <a href="" class="text-[14px] text-blue-500">The word *X* means Y: Should Y be in italics, quotes, or neither?</a>
                            </li>
                        </ul>
                    </div>
                    {{-- hot questions end --}}
                </div>
            {{-- blogs Sections, top hot questions & related tags Section end --}}
        </main>
    </section>
@endsection
