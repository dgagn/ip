<x-app-layout>
    <div class="container max-w-sm mt-xl">
        <div class="main-glow absolute h-[12rem] w-[12rem] "></div>
        <h2 class="text-center">{{__('auth.reset-password.title')}}</h2>
        <p class="text-center mt-md mx-auto text-contrast-500">
            {{__('auth.reset-password.description')}}
        </p>

        <x-error class="mt-md" :error="$errors"></x-error>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mt-md">
                <label class="mb-3xs" for="email">{{__('auth.label-email')}}</label>
                <input type="email" id="email" name="email" class="w-full" value="{{old('email', $request->email)}}" required>
            </div>

            <div class="mt-md">
                <label class="mb-3xs" for="password">{{__('auth.label-password')}}</label>
                <input type="password" id="password" name="password" class="w-full" required autofocus>
            </div>

            <div class="mt-md">
                <label class="mb-3xs" for="password_confirmation">{{__('auth.label-confirm-password')}}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full" required>
            </div>

            <x-button class="w-full mt-lg">{{__('auth.reset-password.submit')}}</x-button>
        </form>
    </div>
</x-app-layout>
