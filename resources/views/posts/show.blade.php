<x-app-layout>
    <div class="container max-w-md">
        <h3>{{$post->ip}}</h3>
        <p>{{$post->body}}</p>
        <p>{{$post->created_at->format('F d, Y')}}</p>
        <p>{{$post->author->name}}</p>
        <p>{{$post->rating ?: 0}}</p>

        <x-error class="mt-md" :error="$errors"></x-error>

        @auth

            @if (!$isRatedByUser)
                <form action="{{route('posts.ratings', $post->id)}}" method="post">
                    @csrf
                    <x-button>like</x-button>
                </form>

                <form action="{{route('posts.ratings', $post->id)}}" method="post">
                    @csrf
                    @method('delete')

                    <x-button>dislike</x-button>
                </form>
            @endif

            <form action="{{route('posts.comments.store', $post->id)}}" method="post">
            @csrf

            <label for="body">
                Commente mon beau
            </label>
            <textarea class="w-full" name="body" id="body" cols="30" rows="5"></textarea>
            <x-button>Commenter</x-button>
        </form>

        @else
            <p>login ou register pour participer dans les commentaires ;)</p>
        @endauth

        @foreach($post->comments as $comment)
            <p>{{$comment->body}}</p>
            <p>{{$comment->created_at->format('F d, Y')}}</p>
            <p>{{$comment->author->name}}</p>
        @endforeach
    </div>
</x-app-layout>
