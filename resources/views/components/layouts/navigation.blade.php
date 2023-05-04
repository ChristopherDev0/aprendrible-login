<nav>
    <ul>
        <div class="links-navagation">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('posts.index') }}">Blog</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </div>
        <div class="links-navagation">

            @guest
                <li><a href="{{ route('register') }}" class=" {{ request()->routeIs('register') ? 'rojo' : 'verde'}} ">Register</a></li>
                <li><a href="{{ route('login') }}" class=" {{ request()->routeIs('login') ? 'rojo' : 'verde'}} ">Login</a></li>
            @endguest

            {{-- cerrar sesion --}}
            @auth
            <div class="user-actual">
                <p class="nav-user">{{ Auth::user()->name }}</p>            
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="button-logout">Logout</button>
                </form>
            </div>
            @endauth

        </div>
    </ul>
</nav>