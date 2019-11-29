@extends("layouts.app")

@section ("content")

    <div class="post-divider">
        <h1 class="post-title">
            {{$post->title}}
        </h1>
        <div >
            <h3 class="post-body">
                {{$post->body}}
            </h3>
        </div>
        <div>
            @if($post->filePath)
            <img src="/storage/userUploads/{{$post->filePath}}" alt="image" class="post-image">
            @endif
            <div>
                Author: {{$post->user->name}}
            </div>
            <br>
            {{$post->created_at}}

            @auth()
                @if($post->user->name == Auth::user()->name)
                    <a href="/posts/{{$post->id}}/edit">edit</a>
                @endif
            @endauth

        </div>
    </div>
    <hr style="margin: 0">
    @auth()
        <div class="post-divider" style="display: flex;border-width: 0">

                <form action="/posts/{{$post->id}}" method="POST" style="flex:1;display: flex">
                    @csrf
                    <textarea type="text" name="body" required class="add-comment-box"></textarea>
                    <input type="submit" value="Comment" class="add-comment-button">
                </form>

        </div>
    @endauth
    @foreach($comments as $comment)
    <div class="comment-divider">
        <h5 style="display:inline">{{$comment->user->name}}: </h5>
        <h5 style="display: inline">{{$comment->body}}</h5>

    </div>
    @endforeach
@endsection
