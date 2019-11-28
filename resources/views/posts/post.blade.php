@extends("layouts.app")

@section ("content")
<html>
    <head>
        <h1>
            {{$post->title}}
        </h1>
    </head>
    <body>
        <div>
            <h3>
                {{$post->body}}
            </h3>
        </div>
        <div>
            @if($post->filePath)
            <img src="/storage/userUploads/{{$post->filePath}}" alt="image">
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
    </body>
</html>
@endsection
