<nav id="nav-bar" class="custom-nav bg-black border-b border-gray-400">
    <!-- ***** Logo Start ***** -->
    <a href="/" class="logo">
        <img src="{{asset('logo/logo.png')}}" alt="" class="w-[130px] white-image">
    </a>
    <!-- ***** Logo End ***** -->
    <button class="menu-toggle">&#9776;</button>
    <ul class="menu-items">
        <li><a href="{{ route('main') }}" class="navEl hover:bg-green-500 hover:text-black text-gray-400">Home</a></li>
        <li><a href="{{ route('about_us') }}" class="navEl hover:bg-green-500 hover:text-black text-gray-400">About</a></li>
        <li><a href="{{ route('blog-main') }}" class="navEl hover:bg-green-500 hover:text-black text-gray-400">Articles</a></li>
        @auth()
            <li><a href="{{ route('get_top_users') }}" class="navEl hover:bg-green-500 hover:text-black text-gray-400">Top Users</a></li>
        @endauth
        <li><a href="{{ route('top_questions') }}" class="navEl hover:bg-green-500 hover:text-black text-gray-400">Top questions</a></li>
        <li><a href="{{ route('contact_us') }}" class="navEl hover:bg-green-500 hover:text-black text-gray-400">Message Us</a></li>
        @guest()
            <li><a href="{{ route('login') }}" class="navEl bg-red-500 hover:text-black text-gray-100">Get started</a></li>
        @endguest
    </ul>
    <!-- ***** Menu End ***** -->
</nav>

<style>
    .logo {
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
        padding: 0 20px;
        position: fixed;
        width: 100%;
        z-index: 100;
        background-color: #000;
    }

    .menu-toggle {
        display: none;
        background: none;
        border: none;
        font-size: 20px;
        color: #fff;
        cursor: pointer;
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
        text-decoration: none;
        padding: 12px 16px;
        border-radius: 30px;
        transition: background-color 0.3s, color 0.3s;
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

    @media screen and (max-width: 768px) {
        .menu-items {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 50px;
            left: 0;
            width: 100%;
            background-color: #000;
            padding: 20px;
            box-sizing: border-box;
        }

        .menu-toggle {
            display: block;
        }

        .menu-toggle.active + .menu-items {
            display: flex;
        }

        .menu-items li {
            margin-bottom: 10px;
        }
    }
</style>

<script>
    document.querySelector('.menu-toggle').addEventListener('click', function() {
        this.classList.toggle('active');
    });
</script>

<script>

    const navEls = document.querySelectorAll('.navEl');

    navEls.forEach((el, i) => {
        if(localStorage.getItem('navElIndex') == i) {
            el.classList.add('bg-green-500', 'text-black');
        }
    })

    navEls.forEach((el, i) => {
        el.addEventListener('click', _ => {
            localStorage.removeItem('SideElIndex');
            localStorage.setItem('navElIndex', i);
        })
    })
</script>
