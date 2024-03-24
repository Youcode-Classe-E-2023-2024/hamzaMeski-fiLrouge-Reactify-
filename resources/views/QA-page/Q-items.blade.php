@extends('QA-page.main')

@section('main-content')
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
@endsection
