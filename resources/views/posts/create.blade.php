<x-app-layout>
    <div class="container max-w-sm my-lg">
        <div class="main-glow absolute h-[12rem] w-[12rem] "></div>

        <a class="text-sm" href="{{route('home')}}">Retour à l'accueil</a>

        <h1 class="text-center mb-xs mt-sm">Ajouter une adresse IP</h1>
        <p class="text-center text-contrast-500 mb-xl">
            @auth
                Une approbation va être automatiquement mis, car vous ête connecté.
            @else
                <a href="{{route('login')}}">Login</a> ou <a href="{{route('register')}}">Register</a> pour avoir une approbation automatique.
            @endauth
        </p>

        <form action="{{ route('posts.store') }}" method="post">
            @csrf

            <div class="mb-lg">
                <label class="mb-3xs" for="ip">IP</label>
                <input type="text" id="ip" name="ip" class="w-full mb-3xs @error('ip') border-2 border-error-500 focus-within:ring-error-500 @enderror" value="{{old('ip') ?? $from}}" required autofocus>
                @error('ip')
                    <x-alert class="mt-3xs" type="error">{{$message}}</x-alert>
                @enderror
{{--                <x-error class="mb-md mt-xs" :error="$errors"></x-error>--}}
            </div>
            <label class="mb-xs" for="body">Description</label>
            <textarea class="w-full @error('body') border-2 border-error-500 focus-within:ring-error-500 @enderror" name="body" id="body" cols="30" rows="3" required>{{old('body')}}</textarea>
            @error('body')
                <x-alert class="mt-3xs" type="error">{{$message}}</x-alert>
            @enderror
            <x-button class="w-full mt-md">Ajouter</x-button>
        </form>
    </div>
</x-app-layout>
