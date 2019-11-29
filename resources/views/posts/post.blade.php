@extends("layouts.app")

@section ("content")
<html>
    <head>

    </head>
    <body>
        <div class="post">
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
    </body>
</html>
@endsection
