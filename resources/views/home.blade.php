<x-app-layout>
    <div class="main-glow absolute h-[12rem] w-[12rem] "></div>
    <div class="container max-w-sm min-h-screen flex flex-col justify-center overflow-y-hidden -mt-lg">
        <h1>Faire une recherche</h1>
        <div>
            <form class="mt-md" action="{{route('posts.search')}}" method="get">
                <label for="query">Rechercher</label>
                <div class="mt-2xs flex gap-md items-center flex-col sm:flex-row">
                    <input value="{{old('q')}}" type="text" id="query" name="q" class="w-full flex-1 @error('q') border-2 border-error-500 focus-within:ring-error-500 @enderror" required autofocus>
                    <x-button class="self-center w-full sm:w-auto">Rechercher</x-button>
                </div>
                @error('q')
                    <x-alert class="mt-xs" type="error">{{$message}}</x-alert>
                @enderror
            </form>
        </div>
    </div>
</x-app-layout>
