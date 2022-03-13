<nav class="flex gap-x-md">
    <a href="{{route('home')}}">home</a>

    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">logout</a>
        </form>
    @else
        <a href="{{route('login')}}">login</a>
        <a href="{{route('register')}}">register</a>
    @endauth

    <theme-switcher></theme-switcher>
</nav>