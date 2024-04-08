@extends('QA-page.main')

@section('main-content')
    {{-- Questions Section start --}}
    {{--  home carousel container start  --}}
    <section class="glassy_cards_container">
        <link rel="stylesheet" href="{{asset('glassy-cards/style.css')}}">
        <main class="container">
            @php
                $i = 0
            @endphp
            @foreach($mostLikedBlogs as $blog)
                @php
                    $i++
                @endphp
                @if($i == 1)
                    <div class="box1 grid grid-cols-5 gap-4" data-tilt data-tilt-glare>
                        <div class="col-span-4 bg-red-500 p-4">
                            <div>
                                <p class="text-[15px]">{{substr($blog->content, 0, 600)}}...</p>
                                <a href="{{ route('article_details', $blog->id) }}" class="font-bold text-2xl">{{$blog->title}}</a>
                            </div>
                        </div>
                        <div class="span-col-1 flex flex-col justify-center">
                            <div class="profile flex items-center gap-2">
                                <ion-icon name="heart" class="text-red-500 text-3xl"></ion-icon>
                                <span class="profile-name">{{$blog->likes}}</span>
                            </div>
                            <div class="text-[10px] mb-4">likes</div>
                            <div class="profile flex items-center gap-2">
                                <ion-icon name="help-circle" class="text-green-500 text-3xl"></ion-icon>
                                <span class="profile-name">201</span>
                            </div>
                            <div class="text-[10px]">common questions</div>
                        </div>
                    </div>
                @elseif($i == 2)
                    <div class="box2 grid grid-cols-5 gap-4" data-tilt data-tilt-glare>
                        <div class="col-span-4 bg-red-500 p-4">
                            <div>
                                <p class="text-[15px]">{{substr($blog->content, 0, 600)}}...</p>
                                <a href="{{ route('article_details', $blog->id) }}" class="font-bold text-2xl">{{$blog->title}}</a>

                            </div>
                        </div>
                        <div class="span-col-1 flex flex-col justify-center">
                            <div class="profile flex items-center gap-2">
                                <ion-icon name="heart" class="text-red-500 text-3xl"></ion-icon>
                                <span class="profile-name">{{$blog->likes}}</span>
                            </div>
                            <div class="text-[10px] mb-4">likes</div>
                            <div class="profile flex items-center gap-2">
                                <ion-icon name="help-circle" class="text-green-500 text-3xl"></ion-icon>
                                <span class="profile-name">201</span>
                            </div>
                            <div class="text-[10px]">common questions</div>
                        </div>
                    </div>
                @else
                    <div class="box3 grid grid-cols-1 grid-rows-5 gap-4" data-tilt data-tilt-glare>
                        <div class="row-span-4 bg-red-500 p-4">
                            <div>
                                <p class="text-[15px]">{{substr($blog->content, 0, 600)}}...</p>
                                <a href="{{ route('article_details', $blog->id) }}" class="font-bold text-2xl">{{$blog->title}}</a>

                            </div>
                        </div>
                        <div class="row-col-1 flex items-center justify-center gap-6">
                            <div class="profile flex items-center gap-2">
                                <ion-icon name="heart" class="text-red-500 text-3xl"></ion-icon>
                                <span class="profile-name">{{$blog->likes}}</span>
                            </div>
                            <div class="profile flex items-center gap-2">
                                <ion-icon name="help-circle" class="text-green-500 text-3xl"></ion-icon>
                                <span class="profile-name">201</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </main>
        <h1 class="text-4xl font-bold text-white mt-8 three-d">Top 3 Articles Powered by Artificial Intelligence</h1>
        <script src="{{ asset('glassy-cards/app.js') }}"></script>
    </section>
    {{--    home carousel container end     --}}
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
                    <div class="col-span-4 text-[14px] flex text-sky-500"><a href="{{ route('question-details', $question->id) }}">{{ substr($question->title, 0, 100) }}</a></div>
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
                    <div class="h-[30px] w-[30px] rounded-md bg-black" style="background-image: url('{{asset('http://127.0.0.1:8000/storage/'.$question->user->image )}}'); background-size: cover"></div>
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
