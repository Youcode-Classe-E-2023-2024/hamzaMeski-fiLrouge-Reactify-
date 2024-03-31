@extends('shared.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('article-details/style.css') }}">
    <div class="article-container">
        <header>
            <h1 class="heading-1">the light star</h1>
            <div class="sub-heading">
                <p>Saterday, <span>june 26, 2021</span></p>
                <p class="importent">your right to know</p>
            </div>
        </header>

        <div class="main">
            <div class="home">
                <div class="left">
                    <img src="{{ 'https://source.unsplash.com/800x400/?' . $article->title }}" class="home-img" alt="Paper photo">

                    <blockquote>
                        <h2 class="heading-2">
                            {{ $article->title }}
                        </h2>
                    </blockquote>

                </div>

                <div class="right">
                    <h3 class="heading-3">latest news</h3>
                    <div class="lists">
                        <div class="list">
                            <img src="{{ asset('article-details/img/list-img-1.jpg') }}" alt="photo 1">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, veritatis!</p>
                        </div>

                        <div class="list">
                            <img src="{{ asset('article-details/img/list-img-2.jpg') }}" alt="photo 2">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, veritatis!</p>
                        </div>

                        <div class="list">
                            <img src="{{ asset('article-details/img/list-img-3.jpg') }}" alt="photo 3">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, veritatis!</p>
                        </div>

                        <div class="list">
                            <img src="{{ asset('article-details/img/list-img-4.jpg') }}" alt="photo 4">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, veritatis!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <article>
            {{ $article->content }}
        </article>
    </div>
@endsection
