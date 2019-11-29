@extends("layouts.app")

@section("content")


        @foreach($posts as $post)
            <div class="post">
                <div>
                    <a style="font-size: 40px" href="/posts/{{$post->id}}">{{$post->title}}</a>
                    <h4>{{$post->body}}</h4>
                </div>
                <img src="/storage/userUploads/{{$post->filePath}}" alt="" height="50" widht="50">
                <div>
                    <h6 class="a" style="display: inline ">
                        {{$post->name}}
                    </h6>
                    <h6 class="date"  style="display: inline">
                        {{$post->created_at}} <!-- ->toRfc850String() -->
                    </h6>

                </div>
            </div>
        @endforeach

@endsection


@push("sorting")
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Sort by <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/posts/all/1">
                Title ascending
            </a>
            <a class="dropdown-item" href="/posts/all/2">
                Title descending
            </a>
            <a class="dropdown-item" href="/posts/all/3">
                Date ascending
            </a>
            <a class="dropdown-item" href="/posts/all/4">
                Date descending
            </a>
            <a class="dropdown-item" href="/posts/all/5">
                Author ascending
            </a>
            <a class="dropdown-item" href="/posts/all/6">
                Author descending
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endpush
