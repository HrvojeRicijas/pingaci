@extends ("layouts.app")

@section ("content")
<html>

    <head>

    </head>

    <body style="text-align: center">


        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label class="label" for="title">Title</label>
                <div>
                    <input class="text" type="text" name="title" id="title" placeholder="Title" required value="{{old("title")}}"></text>
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>
                <div>
                    <textarea class="textarea" type="text" name="body" id="body" placeholder="The body of your post" >{{ old("body") }}</textarea>
                </div>
            </div>
            <div class="field">
                <input accept="image/*" name="filePath" type="file">
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
