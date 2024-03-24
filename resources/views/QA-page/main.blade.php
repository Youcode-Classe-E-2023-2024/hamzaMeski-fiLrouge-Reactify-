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
        <main class=" h-full w-full overflow-auto grid grid-cols-5">
            {{-- Questions Section start --}}
                <div class="col-span-3 h-full pt-6">
                    <div class="flex items-center justify-between px-6">
                        <span class="text-2xl">All Questions</span>
                        <a href="{{ route('ask-question.show') }}" class="text-white bg-[#03a4ed] px-4 py-2 rounded-md text-[14px]">Ask Question</a>
                    </div>
                    <div class="flex items-center justify-between mt-4 px-6 pb-6">
                        <span class="">24,115,613 questions</span>
                        <table>
                            <tr>
                                <td class="border px-4 py-2 bg-gray-200">2000 comments</td>
                                <td class="border px-4 py-2">70k likes</td>
                                <td class="border px-4 py-2">50k votes</td>
                                <td class="border px-4 py-2">10m answers</td>
                            </tr>
                        </table>

                    </div>

                    <div class="border-t-[1px] px-6 py-6 w-full">
                        <div class="grid grid-cols-5 gap-y-2 gap-x-4 border-solid border-gray-400">
                            <div class="col-span-1 flex justify-end text-[14px]"><span>1 votes</span></div>
                            <div class="col-span-4 text-[14px] flex text-sky-500"><a href="">How to create a zoom animation in Jetpack Compose</a></div>
                            <div class="col-span-1 flex justify-end text-[14px]"><span>1 answers</span></div>
                            <div class="col-span-4 text-[14px]"><span>I'm new to Jetpack Compose and this is the first animation I'm trying to prod. I'm trying to make an ani lksj flqjsdf flqsj lqksjdf l mation that endgame.</span></div>
                            <div class="col-span-1 flex justify-end text-[14px]"><span>1 views</span></div>
                            <div class="col-span-4">
                                <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">android</a>
                                <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">kotlin</a>
                                <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">android-jetpack-compose</a>
                                <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">android-animation</a>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-1 mt-2">
                            <div class="h-[30px] w-[30px] rounded-md bg-gray-900"></div>
                            <a href="" class="text-blue-500 text-[13px]">hamza</a>
                            <span class="text-[13px] text-gray-700">asked 1 min ago</span>
                        </div>
                    </div>
                    <div class="border-t-[1px] px-6 py-6">
                        <div class="grid grid-cols-5 gap-y-2 gap-x-4 border-solid border-gray-400">
                            <div class="col-span-1 flex justify-end text-[14px]"><span>1 votes</span></div>
                            <div class="col-span-4 text-[14px] flex text-sky-500"><span>How to create a zoom animation in Jetpack Compose</span></div>
                            <div class="col-span-1 flex justify-end text-[14px]"><span>1 answers</span></div>
                            <div class="col-span-4 text-[14px]"><span>I'm new to Jetpack Compose and this is the first animation I'm trying to prod. I'm trying to make an ani lksj flqjsdf flqsj lqksjdf l mation that endgame.</span></div>
                            <div class="col-span-1 flex justify-end text-[14px]"><span>1 views</span></div>
                            <div class="col-span-4">
                                <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">android</a>
                                <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">kotlin</a>
                                <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">android-jetpack-compose</a>
                                <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">android-animation</a>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-1 mt-2">
                            <div class="h-[30px] w-[30px] rounded-md bg-gray-900"></div>
                            <a href="" class="text-blue-500 text-[13px]">hamza</a>
                            <span class="text-[13px] text-gray-700">asked 1 min ago</span>
                        </div>
                    </div>
                </div>
            {{-- Questions Section end --}}

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
