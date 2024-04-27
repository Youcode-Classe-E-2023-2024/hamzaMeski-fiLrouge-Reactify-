<nav id="nav-bar" class="custom-nav bg-green-700">
    <!-- ***** Logo Start ***** -->
    <a href="/" class="">
        <img src="{{asset('logo/logo.png')}}" alt="" class="w-[130px] white-image">
    </a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="menu-items">
        <li><a href="{{ route('main') }}">Home</a></li>
        <li><a href="{{ route('about_us') }}">About</a></li>
        <li><a href="{{ route('blog-main') }}">Articles</a></li>
        @auth()
            <li><a href="{{ route('get_top_users') }}">Top Users</a></li>
        @endauth
        <li><a href="{{ route('top_questions') }}">Top questions</a></li>
        <li><a href="{{ route('contact_us') }}">Message Us</a></li>
        @guest()
            <li><div class="main-red-button"><a href="http://127.0.0.1:8000/login">Get Started</a></div></li>
        @endguest
    </ul>
    <!-- ***** Menu End ***** -->
</nav>

<style>
    .white-image {
        filter: grayscale(100%) brightness(1000%);
    }

    .custom-nav {
        height: 50px; /* Increased height for more prominence */
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 40px; /* Adjusted padding for better alignment */
        position: fixed;
        /*background: rgb(10,107,170);*/
        /*background: linear-gradient(90deg, rgba(10,107,170,1) 35%, rgba(13,152,117,1) 72%, rgba(2,214,87,1) 100%);*/
        width: 100%;
        z-index: 100;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .menu-items {
        display: flex;
        gap: 30px; /* Increased gap between menu items */
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .menu-items li {
        font-weight: 600; /* Slightly bolder font */
    }

    .menu-items a {
        color: #fff; /* White text color */
        text-decoration: none;
        padding: 12px 16px; /* Adjusted padding for better spacing */
        border-radius: 30px; /* Rounded corners */
        transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover effect */
    }

    .menu-items a:hover {
        color: #000; /* Black text color on hover */
        background-color: #fff; /* White background color on hover */
    }

    .menu-items a.active {
        font-weight: bold;
        color: #fff; /* White text color for active item */
        background-color: #333; /* Darker background color for active item */
    }

    .text-logo-font {
        font-size: 28px; /* Slightly larger font size for the logo */
        font-weight: bold;
        color: #fff; /* White logo color */
        text-decoration: none;
    }

    .main-red-button {
        padding: 10px 16px; /* Adjusted padding for better button size */
        border-radius: 30px; /* Rounded corners */
        background-color: #f87171; /* Red background color */
        transition: background-color 0.3s; /* Smooth transition for button hover effect */
    }

    .main-red-button:hover {
        background-color: #ef4444; /* Darker red background color on hover */
    }

    .main-red-button a {
        color: #fff;
        text-decoration: none;
    }
</style>
