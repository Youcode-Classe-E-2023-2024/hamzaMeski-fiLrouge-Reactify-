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

        @forelse($questions as $question)
            <div class="border-t-[1px] px-6 py-6 w-full">
                <div class="grid grid-cols-5 gap-y-2 gap-x-4 border-solid border-gray-400">
                    <div class="col-span-1 flex justify-end text-[14px]"><span>{{ $question->likes }} votes</span></div>
                    <div class="col-span-4 text-[14px] flex text-sky-500"><a href="">{{ substr($question->title, 0, 100) }}</a></div>
                    <div class="col-span-1 flex justify-end text-[14px]"><span></span></div>
                    <div class="col-span-4 text-[14px]"><span>{{ substr($question->description, 0, 200) }}</span></div>
                    <div class="col-span-1 flex justify-end text-[14px]"><span>{{ $question->answers_count }} answers</span></div>
                    <div class="col-span-4">
                        @foreach($question->tags as $tag)
                            <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center justify-end gap-1 mt-2">
                    <div class="h-[30px] w-[30px] rounded-md bg-gray-900"></div>
                    <a href="" class="text-blue-500 text-[13px]">{{ $question->user->name }}</a>
                    <span class="text-[13px] text-gray-700">asked on: {{ $question->created_at->diffForHumans() }}</span>
                </div>
            </div>
        @empty
            <div class="text-3xl">there is no questions yet.</div>
        @endforelse
    </div>
    {{-- Questions Section end --}}
@endsection
