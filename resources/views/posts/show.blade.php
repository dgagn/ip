<x-app-layout>
    <div class="container max-w-sm mb-xl my-lg">
        <div class="main-glow absolute h-[12rem] w-[12rem] "></div>
        <x-error class="my-md" :error="$errors"></x-error>

        @if (session('status') == 'post_create')
            <x-alert type="success" class="my-md">Post creer</x-alert>
        @endif

        @if (session('status') == 'rating_ok')
            <x-alert type="info" class="my-md">Enregistrer l'avis</x-alert>
        @endif

        <x-go-back></x-go-back>

        <div class="mt-lg -mb-xs justify-center text-contrast-400 flex items-center gap-x-xs text-sm">
            <p>{{__('post.by')}}  {{$post->author->name}}</p>
            <x-seperator></x-seperator>
            <time class="capitalize" datetime="{{$post->created_at}}">{{$post->created_at->isoFormat('MMMM d, Y')}}</time>
        </div>
        <h1 class="text-center mb-xs">{{$post->ip}}</h1>

        <p class="text-center">{{$post->body}}</p>

        <p class="text-center text-3xl font-bold mt-sm mb-xs text-primary-300">{{$post->rating ?: 0}}</p>

        @can('rate', $post)
            <div class="flex gap-x-sm">
                <form action="{{route('posts.ratings', $post->id)}}" method="post" is="form-redirect">
                    @csrf

                    <button class="flex gap-x-2xs text-contrast-400">
                        <svg class="transition fill-contrast-300 hover:fill-contrast-400" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><title>favorite</title><g ><path d="M29.311,4.689A9.192,9.192,0,0,0,16,5.032,9.182,9.182,0,1,0,2.689,17.674l12.6,12.6a1,1,0,0,0,1.414,0l12.6-12.6a9.181,9.181,0,0,0,0-12.984Z" ></path></g></svg>
                        +1
                    </button>
                </form>

                <form action="{{route('posts.ratings', $post->id)}}" method="post">
                    @csrf
                    @method('delete')

                    <button class="flex gap-x-2xs text-contrast-400">
                        <svg class="transition fill-contrast-300 hover:fill-contrast-400" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><title>broken-heart</title><g ><path d="M22.354,2h-.02a8.749,8.749,0,0,0-3.156.643L15,11l6,4-6,9,2-8-6-4,3.762-8.276A8.778,8.778,0,0,0,9.646,2,8.712,8.712,0,0,0,1,10.728c0,8.1,13.777,19.56,14.364,20.043a1,1,0,0,0,1.272,0C17.223,30.288,31,18.833,31,10.731A8.713,8.713,0,0,0,22.354,2Z" ></path></g></svg>
                        -1
                    </button>
                </form>
            </div>
        @else
            @auth
                <div class="flex gap-x-sm fill-contrast-300">
                    <svg class="@if($isLikedByUser) fill-primary-500 @endif" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><title>favorite</title><g ><path d="M29.311,4.689A9.192,9.192,0,0,0,16,5.032,9.182,9.182,0,1,0,2.689,17.674l12.6,12.6a1,1,0,0,0,1.414,0l12.6-12.6a9.181,9.181,0,0,0,0-12.984Z" ></path></g></svg>
                    <p class="text-contrast-400 -ml-3xs">+1</p>

                    <svg class="@if(!$isLikedByUser) fill-primary-500 @endif" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><title>broken-heart</title><g ><path d="M22.354,2h-.02a8.749,8.749,0,0,0-3.156.643L15,11l6,4-6,9,2-8-6-4,3.762-8.276A8.778,8.778,0,0,0,9.646,2,8.712,8.712,0,0,0,1,10.728c0,8.1,13.777,19.56,14.364,20.043a1,1,0,0,0,1.272,0C17.223,30.288,31,18.833,31,10.731A8.713,8.713,0,0,0,22.354,2Z" ></path></g></svg>
                    <p class="text-contrast-400 -ml-3xs">-1</p>
                </div>
            @endauth
        @endcan

        <hr class="border-contrast-200 my-lg">

        @if (session('status') == 'comment_sent')
            <x-alert type="info" class="my-md">Commentaire envoyé</x-alert>
        @endif



        @auth
            <form action="{{route('posts.comments', $post->id)}}" method="post">
                @csrf

                <label class="text-md mb-xs" for="body">
                    Ajouter un nouveau commentaire
                </label>
                <textarea class="w-full" name="body" id="body" cols="30" rows="3" required></textarea>
                <x-button class="mt-2xs">Commenter</x-button>
            </form>
        @else
            <p>
                <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">Register</a> to participate in the comments.
            </p>
        @endauth
        <hr class="border-contrast-200 my-lg">

        @if($post->orderedComments->isEmpty())
            <div>Pas de commentaires </div>
        @endif

        @foreach($post->orderedComments as $comment)
            <div class="flex gap-x-md mt-lg">
                <div class="w-xl h-xl w-full rounded-full bg-contrast-300 flex justify-center items-center">
                    <svg class="fill-contrast-500" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                         viewBox="0 0 32 32"><title>profile</title>
                        <g>
                            <path
                                d="M16,32A32.808,32.808,0,0,1,3.594,29.914,1,1,0,0,1,3,29,10.011,10.011,0,0,1,13,19h6A10.011,10.011,0,0,1,29,29a1,1,0,0,1-.594.914A32.808,32.808,0,0,1,16,32Zm12-3h0Z"></path>
                            <path d="M16,17c-4.579,0-8-4.751-8-9A8,8,0,0,1,24,8C24,12.249,20.579,17,16,17Z"></path>
                        </g>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-x-xs">
                        <p class="text-contrast-900 font-bold">{{$comment->author->name}}</p>
                        <x-seperator></x-seperator>
                        <time class="text-sm"
                              datetime="{{$comment->created_at}}">{{$comment->created_at->diffForHumans()}}</time>
                    </div>

                    <p class="text-contrast-600">{{$comment->body}}</p>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
