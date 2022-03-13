<x-app-layout>

    <div class="container max-w-sm mt-xl">
        <div class="main-glow absolute h-[12rem] w-[12rem] "></div>
        <h2 class="text-center">{{__('auth.register.title')}}</h2>
        <p class="text-center mt-md mx-auto text-contrast-500">
            {{__('auth.register.description')}}
        </p>

        <x-error class="mt-md" :error="$errors"></x-error>

        <form action="{{ route('register') }}" method="post">
            @csrf

            <div class="mt-lg">
                <label class="mb-3xs" for="name">{{__('auth.label-name')}}</label>
                <input type="text" id="name" name="name" class="w-full" value="{{old('email')}}" required autofocus>
            </div>

            <div class="mt-md">
                <label class="mb-3xs" for="email">{{__('auth.label-email')}}</label>
                <input type="email" id="email" name="email" class="w-full" value="{{old('email')}}" required>
            </div>

            <div class="mt-md">
                <label class="mb-3xs" for="password">{{__('auth.label-password')}}</label>
                <input type="password" id="password" name="password" class="w-full" required autocomplete="new-password">
            </div>

            <div class="mt-md">
                <label class="mb-3xs" for="password_confirmation">{{__('auth.label-confirm-password')}}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full" required>
            </div>

            <x-button class="w-full mt-lg">{{__('auth.register.submit')}}</x-button>

            <div class="text-center mt-md">
                <p class="text-sm">{{__('auth.register.have-account')}} <a href="{{route('login')}}">{{__('auth.register.login')}}</a></p>
            </div>
        </form>
    </div>

</x-app-layout>
