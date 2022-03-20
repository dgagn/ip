<header class="py-sm">
    <nav class="container max-w-md flex justify-center xs:justify-evenly text-center xs:text-left">
        <ul class="flex gap-md xs:justify-evenly xs:w-full justify-center xs:items-center flex-col xs:flex-row">
            <li class="">
                <a class="block no-underline" href="{{route('home')}}">
                    Accueil
                </a>
            </li>

            <ul class="xs:flex gap-md items-center">
                @auth
                    <li class="">
                        <a class="no-underline" href="{{route('posts.index')}}">Mes IP</a>
                    </li>
                @endauth

                <li>
                    <a class="no-underline" href="{{route('posts.create')}}">Ajouter une IP</a>
                </li>
            </ul>

            <ul class="xs:flex gap-md items-center">
                @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="no-underline" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">logout</a>
                        </form>
                    </li>
                @else
                    <ul class="gap-md xs:flex items-center">
                        <li class="mb-xs xs:mb-0">
                            <a class="no-underline" href="{{route('login')}}">login</a>
                        </li>
                        <li>
                            <a class="btn bg-primary-500 text-primary-50 hover:bg-primary-600 hover:text-primary-50 no-underline" href="{{route('register')}}">register</a>
                        </li>
                    </ul>
                @endauth
                <li class="flex justify-center mt-md xs:mt-0">
                    <theme-switcher></theme-switcher>
                </li>
            </ul>
        </ul>
    </nav>
</header>
