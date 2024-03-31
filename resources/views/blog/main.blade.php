@extends('shared.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('blog/style.css') }}">

    <section class="home" id="home">
        <div class="home-text container">
            <h2 class="home-title">Blog Powered By AI</h2>
            <span class="home-subtitle">Your source of great content</span>
        </div>
    </section>

    <section class="about container" id="about">
        <div class="contentBx">
            <h2 class="titleText">Catch up with the trending topics</h2>
            <p class="title-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eos consequuntur voluptate dolorum totam provident ducimus cupiditate dolore doloribus repellat. Saepe ad fugit similique quis quam. Odio suscipit incidunt distinctio.
                <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed blanditiis libero pariatur ipsum suscipit voluptates aut, repellendus quos dolor autem, natus laboriosam consectetur maxime cumque, sunt magni optio? Veritatis, ea?
            </p>
            <a href="#" class="btn2">Read more</a>
        </div>
        <div class="imgBx">
            <img src="{{ asset('blog/images/about.png') }}" alt="" class="fitBg">
        </div>
    </section>

    <div class="post-filter container">
        <span class="filter-item active-filter" data-filter="all">All</span>
        <span class="filter-item" data-filter="tech">Tech</span>
        <span class="filter-item" data-filter="food">Food</span>
        <span class="filter-item" data-filter="news">News</span>
    </div>

    <div class="post container">

        @forelse($articles as $article)
            <div class="post-box tech">
                <img src="{{ 'https://source.unsplash.com/600x600/?' . $article->title }}" alt="" class="post-img">
                <h2 class="category">Tech</h2>
                <a href="{{ route('article_details', $article->id) }}" class="post-title">{{ $article->title }}</a>
                <span class="post-date">{{ $article->created_at }}</span>
                <p class="post-description">{{ $article->content }}</p>
                <div class="profile">
                    <ion-icon name="heart" class="text-red-500 text-2xl"></ion-icon>
                    <span class="profile-name">22 likes</span>
                </div>
            </div>
        @empty
            <div class="text-center font-bold text-2xl">there is no article</div>
        @endforelse

    </div>
@endsection
