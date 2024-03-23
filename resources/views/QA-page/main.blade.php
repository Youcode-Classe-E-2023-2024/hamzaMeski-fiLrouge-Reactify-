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
        <main class=" h-full w-full overflow-auto">
            {{-- Questions Section start --}}
                <div class="w-[60%] h-full border-r-[1px] border-solid border-gray-500 pt-6">
                    <div class="flex items-center justify-between px-6">
                        <span class="text-2xl">All Questions</span>
                        <a href="" class="text-white bg-[#03a4ed] px-4 py-2 rounded-md text-[14px]">Ask Question</a>
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
                    <div class="grid grid-cols-5 gap-2 border-t-[1px] border-solid border-gray-400 px-6 py-6">
                        <div class="bg-gray-200 col-span-1 flex justify-end"><span>1 votes</span></div>
                        <div class="bg-gray-200 col-span-4 flex"><span>How to create a zoom animation in Jetpack Compose</span></div>
                        <div class="bg-gray-200 col-span-1 flex justify-end"><span>1 answers</span></div>
                        <div class="bg-gray-200 col-span-4"><span>I'm new to Jetpack Compose and this is the first animation I'm trying to produce. I'm trying to make an animation that e</span></div>
                        <div class="bg-gray-200 col-span-1 flex justify-end"><span>1 views</span></div>
                        <div class="bg-gray-200 col-span-4">2</div>
                    </div>
                </div>
            {{-- Questions Section end --}}

            {{-- blogs Sections, top hot questions & related tags Section start --}}
                <div class="w-[40%] h-full">

                </div>
            {{-- blogs Sections, top hot questions & related tags Section end --}}
        </main>
    </section>
@endsection
