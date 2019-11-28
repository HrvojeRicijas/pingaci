@extends ("layouts.app")

@section ("content")
<html>

    <head>

    </head>

    <body style="text-align: center">


        <form action="/posts/{{$post->id}}/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="field">
                <label class="label" for="title">Title</label>
                <div>
                    <input class="text" type="text" name="title" id="title" value="{{ $post->title }}">
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>
                <div>
                    <textarea class="textarea" type="text" name="body" id="body" placeholder="The body of your post">{{ $post->body }}</textarea>
                </div>
            </div>
            <div class="field">
                <input accept="image/*" name="filePath" type="file">
                <input type="checkbox" name="changeImage" value="changeImage">Remove Image<br>
            </div>
            <br>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
    </body>

</html>

@endsection
<!--
@if ($errors->has("excerpt"))
    <p class="help is-danger">{{$errors->first("excerpt")}}</p>
@endif
-->
