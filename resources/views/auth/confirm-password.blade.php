<x-app-layout>
    <div class="container max-w-sm mt-xl">
        <div class="main-glow absolute h-[12rem] w-[12rem] "></div>
        <h2 class="text-center">{{__('auth.confirm-password.title')}}</h2>
        <p class="text-center mt-md mx-auto text-contrast-500">
            {{__('auth.confirm-password.description')}}
        </p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mt-md">
                <label class="mb-3xs" for="password">{{__('auth.confirm-password.label-password')}}</label>
                <input type="password" id="password" name="password" class="w-full" required autocomplete="current-password">
            </div>

            <x-button class="w-full mt-lg">{{__('auth.confirm-password.submit')}}</x-button>
        </form>
    </div>
</x-app-layout>
