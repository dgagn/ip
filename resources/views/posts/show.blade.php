<x-app-layout>
    <div class="container max-w-md">

        <x-error class="mt-md" :error="$errors"></x-error>

        @if (session('status') == 'comment_sent')
            <x-alert type="info" class="mt-md">Commentaire envoyé</x-alert>
        @endif

        @if (session('status') == 'rating_ok')
            <x-alert type="info" class="mt-md">Enregistrer l'avis</x-alert>
        @endif

        <a href="{{route('home')}}">Go back</a>

        <h3>{{$post->ip}}</h3>
        <p>{{$post->body}}</p>
        <p>{{$post->created_at->format('F d, Y')}}</p>
        <p>{{$post->author->name}}</p>
        <p>{{$post->rating ?: 0}}</p>

        @can('rate', $post)
            <form action="{{route('posts.ratings', $post->id)}}" method="post" is="form-redirect">
                @csrf
                <x-button>like</x-button>
            </form>

            <form action="{{route('posts.ratings', $post->id)}}" method="post">
                @csrf
                @method('delete')

                <x-button>dislike</x-button>
            </form>
        @endcan

        @auth
            <form action="{{route('posts.comments.store', $post->id)}}" method="post">
            @csrf

            <label for="body">
                Commente moi ;)
            </label>
            <textarea class="w-full" name="body" id="body" cols="30" rows="5"></textarea>
            <x-button>Commenter</x-button>
        </form>
        @else
            <p>login ou register pour participer dans les commentaires ;)</p>
        @endauth

        @foreach($post->orderedComments as $comment)
            <p>{{$comment->body}}</p>
            <p>{{$comment->created_at->format('F d, Y')}}</p>
            <p>{{$comment->author->name}}</p>
        @endforeach
    </div>

    <script>
    </script>
</x-app-layout>
