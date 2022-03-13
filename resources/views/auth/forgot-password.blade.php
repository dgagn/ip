<x-app-layout>
    <div class="container max-w-sm mt-2xl">
        <div class="main-glow absolute h-[12rem] w-[12rem] "></div>

        <h2 class="text-center">{{__('auth.forgot-password.title')}}</h2>
        <p class="text-center mt-md mx-auto text-contrast-500">
            {{__('auth.forgot-password.description')}}
        </p>

        <x-error class="mt-md" :error="$errors"></x-error>

        @if (session('status'))
            <x-alert type="success" class="mt-md">{{session('status')}}</x-alert>
        @endif


        <form action="{{ route('password.email') }}" method="post">
            @csrf

            <div class="mt-lg">
                <label class="mb-3xs" for="email">{{__('auth.label-email')}}</label>
                <input type="email" id="email" name="email" class="w-full" value="{{old('email')}}" required autofocus>
            </div>

            <x-button class="w-full mt-md">{{__('auth.forgot-password.submit')}}</x-button>

            <div class="text-center mt-sm">
                <p class="text-sm"><a href="{{route('login')}}">&larr; {{__('auth.forgot-password.back')}}</a></p>
            </div>
        </form>
    </div>

</x-app-layout>
