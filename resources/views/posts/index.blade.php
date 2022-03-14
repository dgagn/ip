<x-app-layout>
    <div class="container max-w-md">
        @foreach($posts as $post)
            <h3>{{$post->ip}}</h3>
            <p>{{$post->body}}</p>
            <p>{{$post->created_at->format('F d, Y')}}</p>
            <p>{{$post->author->name}}</p>
            <p>{{$post->rating ?: 0}}</p>
            <p>{{$post->no_comments ?: 'no comments' }}</p>
        @endforeach
    </div>
</x-app-layout>
