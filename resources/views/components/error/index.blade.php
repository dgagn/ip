@props(['errors'])

@if($errors->any())
    @foreach ($errors->all() as $error)
        <x-alert {{$attributes}} type="error">{{$error}}</x-alert>
    @endforeach
@endif
