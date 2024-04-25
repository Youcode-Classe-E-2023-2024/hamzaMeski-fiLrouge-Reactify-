<nav id="nav-bar" class="custom-nav">
    <!-- ***** Logo Start ***** -->
    <a href="{{ route('front-page') }}" class="text-logo-font">
{{--        <img src="{{asset('images/logo.png')}}" class="w-[150px]" alt="">--}}
        <div class="text-gray-300" style="font-family: cursive ">Reactify</div>
    </a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="menu-items">
        <li><a href="{{ route('main') }}" >Home</a></li>
        <li><a href="{{ route('td-landing') }}" >About</a></li>
        <li><a href="{{ route('blog-main') }}">Articles</a></li>
        <li><a href="{{ route('get_top_users') }}">Top Users</a></li>
        <li><a href="{{ route('top_questions') }}">Top questions</a></li>
        <li><a href="{{route('contact_us')}}">Message Us</a></li>
        <li><div class="main-red-button"><a href="http://127.0.0.1:8000/login">Get Started</a></div></li>
    </ul>
    <!-- ***** Menu End ***** -->
</nav>

<style>

    .custom-nav {
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 80px;
        position: fixed;
        background-color: rgba(255, 255, 255, 0);
        backdrop-filter: blur(5px);
        width: 100%;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        left: 0;
        right: 0;
        z-index: 100;
        /*!*background: rgb(0,7,36);*!*/
        /*background: linear-gradient(90deg, rgba(0,7,36,1) 0%, rgba(118,9,121,1) 35%, rgba(255,72,0,1) 100%);*/
        background: rgb(10,107,170);
        background: linear-gradient(90deg, rgba(10,107,170,1) 35%, rgba(13,152,117,1) 72%, rgba(2,214,87,1) 100%);
    }

    .menu-items {
        display: flex;
        justify-content: flex-end;
        gap: 20px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .menu-items li {
        font-weight: 500;
    }

    .menu-items a {
        color: white;
        text-decoration: none;
    }

    .menu-items a.active {
        font-weight: bold;
    }

    .text-logo-font {
        font-size: 24px;
        font-weight: bold;
    }

    .text-reactify-blue {
        color: #03a4ed;
        letter-spacing: 2px;
    }

    .text-reactify-red {
        color: #fe3f40;
    }

    .main-red-button {
        /* Define styles for your button here */
    }
</style>
