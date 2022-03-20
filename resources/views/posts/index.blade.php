<x-app-layout>
    <div class="container max-w-md">

        @if (session('status') == 'delete_ok')
            <x-alert type="info" class="my-md">L'adresse IP à bien été supprimé.</x-alert>
        @endif

        <hr class="border-contrast-200 my-lg">

        @foreach($posts as $post)
            <article>
                <time class="capitalize text-sm text-contrast-900" datetime="{{$post->created_at}}">{{$post->created_at->isoFormat('MMMM D, Y')}}</time>

                <div class="flex justify-between items-center">
                    <h3 is="h2" class="my-2xs"><a href="{{route('posts.show', $post->id)}}" class="text-contrast-900 no-underline hover:underline hover:text-contrast-900">{{$post->ip}}</a></h3>

                    @can('posts.destroy', $post)
                        <form action="{{route('posts.delete', $post->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <x-button type="error">delete</x-button>
                        </form>
                    @endcan
                </div>

                <p class="text-contrast-500 text-sm">{{$post->body}}</p>

                <div class="flex items-center gap-x-xs text-contrast-500 mt-md">
                    <svg class="fill-contrast-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>hearts-suit</title><g><path d="M16.722,2A6.205,6.205,0,0,0,12,4.162,6.205,6.205,0,0,0,7.278,2,6.264,6.264,0,0,0,2.726,12.582l8.553,8.889a1,1,0,0,0,1.442,0l8.553-8.889.007-.007A6.264,6.264,0,0,0,16.722,2Z"></path></g></svg>
                    <div>{{$post->rating ?: 0}}</div>
                </div>
            </article>
            <hr class="border-contrast-200 my-lg">

        @endforeach
    </div>

</x-app-layout>
