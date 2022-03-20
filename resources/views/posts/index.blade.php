<x-app-layout>
    @foreach($posts as $post)
        <article>
            <div class="flex items-center gap-x-xs text-sm mb-3xs">
                <p>{{__('post.by')}} <a class="text-contrast-900" href="{{route('posts.show', $post->id)}}" rel="author">{{$post->author->name}}</a></p>
                <x-seperator></x-seperator>
                <time class="capitalize" datetime="{{$post->created_at}}">{{$post->created_at->isoFormat('MMMM d, Y')}}</time>
                <x-seperator></x-seperator>
                <a class="text-contrast-900" href="{{route('posts.show', $post->id)}}">{{$post->no_comments ?: __('post.no')}} {{$post->no_comments > 1 ? __('post.comment.plural') : __('post.comment.singular')}}</a>
            </div>

            <div class="max-w-2xs">
                <h3 is="h2"><a href="{{route('posts.show', $post->id)}}" class="link text-contrast-900 hover:text-contrast-900 bg-no-repeat ease-in-out duration-150 transition-all">{{$post->ip}}</a></h3>
                <p class="text-contrast-500 mt-xs">{{$post->body}}</p>

                <div class="flex items-center gap-x-xs text-contrast-500 mt-xs">
                    <svg class="fill-contrast-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>hearts-suit</title><g><path d="M16.722,2A6.205,6.205,0,0,0,12,4.162,6.205,6.205,0,0,0,7.278,2,6.264,6.264,0,0,0,2.726,12.582l8.553,8.889a1,1,0,0,0,1.442,0l8.553-8.889.007-.007A6.264,6.264,0,0,0,16.722,2Z"></path></g></svg>
                    <div>{{$post->rating ?: 0}}</div>
                </div>
            </div>
        </article>
    @endforeach

</x-app-layout>
