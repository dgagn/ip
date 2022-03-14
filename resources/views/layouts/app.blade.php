<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{$theme}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="turbolinks-cache-control" content="no-cache"/>
        <link rel="stylesheet" href="{{ mix('css/main.css') }}" data-turbolinks-track="true">
        <script src="{{ mix('js/app.js') }}" defer data-turbolinks-track="true"></script>
    </head>
    <body>
        @include('layouts.navigation')

        {{ $slot }}
    </body>
</html>
