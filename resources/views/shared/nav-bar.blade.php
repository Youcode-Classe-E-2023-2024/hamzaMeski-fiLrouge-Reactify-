<nav id="nav-bar" class="custom-nav bg-black border-b border-gray-400">
    <!-- ***** Logo Start ***** -->
    <a href="/" class="logo">
        <img src="{{asset('logo/logo.png')}}" alt="" class="w-[130px] white-image">
    </a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="menu-items">
        <li><a href="{{ route('main') }}" class="hover:bg-green-500 hover:text-black text-gray-400">Home</a></li>
        <li><a href="{{ route('about_us') }}" class="hover:bg-green-500 hover:text-black text-gray-400">About</a></li>
        <li><a href="{{ route('blog-main') }}" class="hover:bg-green-500 hover:text-black text-gray-400">Articles</a></li>
        @auth()
            <li><a href="{{ route('get_top_users') }}" class="hover:bg-green-500 hover:text-black text-gray-400">Top Users</a></li>
        @endauth
        <li><a href="{{ route('top_questions') }}" class="hover:bg-green-500 hover:text-black text-gray-400">Top questions</a></li>
        <li><a href="{{ route('contact_us') }}" class="hover:bg-green-500 hover:text-black text-gray-400">Message Us</a></li>
        @guest()
        <li><a href="{{ route('login') }}" class="bg-red-500 hover:text-black text-gray-100">Get started</a></li>
        @endguest
    </ul>
    <!-- ***** Menu End ***** -->
</nav>

<style>
    .logo {
        /*background-color: black;*/
        margin: 5px;
    }
    .white-image {
        filter: grayscale(100%) brightness(1000%);
    }

    .custom-nav {
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 40px;
        position: fixed;
        width: 100%;
        z-index: 100;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .menu-items {
        display: flex;
        gap: 20px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .menu-items li {
        font-weight: 600;
    }

    .menu-items a {
        /*color: #fff;*/
        text-decoration: none;
        padding: 12px 16px;
        border-radius: 30px;
        transition: background-color 0.3s, color 0.3s;
    }


    .menu-items a.active {
        font-weight: bold;
        /*color: #fff;*/
        background-color: #333;
    }

    .text-logo-font {
        font-size: 28px;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
    }

    .main-red-button {
        padding: 10px 16px;
        border-radius: 30px;
        background-color: #f87171;
        transition: background-color 0.3s;
    }

    .main-red-button:hover {
        background-color: #ef4444;
    }

    .main-red-button a {
        color: #fff;
        text-decoration: none;
    }
</style>
