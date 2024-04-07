@extends('shared.layout')

@section('content')
    <main>
        <link rel="stylesheet" href="{{asset('3d-landing/style.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
        <div id="main">
            <div id="page">
                <div id="loop">
                    <h1 class="text-orange-500"><b>DEVELOPER</b>FICTION IS THE <b><i>REAL</i></b> <span>STORY</span> IN THE <span><i>CODEVERSE.</i></span></h1>
                    <h1><b>DEVELOPER</b>FICTION IS THE <b><i>REAL</i></b> <span>STORY</span> IN THE <span><i>CODEVERSE.</i></span></h1>
                    <h1 class="text-violet-500"><b>DEVELOPER</b>FICTION IS THE <b><i>REAL</i></b> <span>STORY</span> IN THE <span><i>CODEVERSE.</i></span></h1>
                </div>
                <h3>REACTIFY AIMS TO BE A DECENTRALIZED COMMUNITY THAT CAN <br> CREATE NEW VALUES AND PROFITS THROUGH INTERACTION IN THE <br> DIGITAL WORLD.</h3>
                <h4>...SCROLL TO READ</h4>
                <canvas></canvas>
            </div>
            <div id="page1">
                <div id="right-text" class="text-violet-500">
                    <h3>REACTIFY / KEY WORD</h3>
                    <h1>HAVE FUN
                        <br>
                        LET'S PLAY
                        <br>
                        JUST BE TOGETHER</h1>
                </div>
                <div id="left-text" class="text-orange-500">
                    <h1>MAKE A STORY
                        <br>
                        TAKE A CHANCE
                        <br>
                        BUILD AND OWNED</h1>
                    <h3>..AND MAINTAIN GOOD PROGRAMMING PRACTICES</h3>
                </div>
            </div>
            <div id="page2">
                <div id="text1">
                    <h3>REACTIFY / HAVE FUN</h3>
                    <h1 class="text-violet-600">LET'S
                        <br>
                        CODE
                        <br>
                        TOGETHER</h1>
                </div>
                <div id="text2">
                    <p>LET'S HAVE A BLAST! LET'S JUST THROW AWAY BARRIERS, DON'T COMPETE, DON'T FIGHT, COOPERATE AND SHARE <br> WITH EACH OTHER AND ENJOY IT TOGETHER! SO THAT YOU CAN STAND <br> THERE IN THE NOT-TOO-DISTANT FUTURE AND DREAM OF ANOTHER NEW <br> FUTURE</p>
                </div>
            </div>
            <div id="page3">
                <div id="text3" class="text-orange-500">
                    <h3>DEVELOPERFICTION / PLAYGROUND</h3>
                    <h1>
                        DEVFIELD
                        <br>
                        IS OUR
                        <br>
                        PLAYGROUND
                    </h1>
                </div>
            </div>
        </div>
        <div>
            hamza meski Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js" integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js" integrity="sha512-AMl4wfwAmDM1lsQvVBBRHYENn1FR8cfOTpt8QVbb/P55mYOdahHD4LmHM1W55pNe3j/3od8ELzPf/8eNkkjISQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('3d-landing/script.js')}}"></script>
    </main>
@endsection
