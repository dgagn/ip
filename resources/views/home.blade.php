<x-app-layout>
    <div class="secondary-glow"></div>
    <div class="container max-w-sm min-h-screen flex flex-col justify-center overflow-y-hidden -mt-lg">
        <h1>Faire une recherche</h1>
        <div>
            <x-error class="mt-md" :error="$errors"></x-error>
            <form class="mt-md" action="{{route('posts.search')}}" method="get">
                <label for="query">Rechercher</label>
                <div class="mt-2xs flex gap-md items-center flex-col sm:flex-row">
                    <input type="text" id="query" name="q" class="w-full flex-1" required autofocus>
                    <x-button class="self-center w-full sm:w-auto">Rechercher</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
