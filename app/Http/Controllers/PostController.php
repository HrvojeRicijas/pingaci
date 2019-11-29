<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index($sort)
    {

        $users = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.name')
            ->get();

        switch ($sort) {
            case 1:
                $posts = $users->sortBy('title');
                break;
            case 2:
                $posts = $users->sortByDesc('title');
                break;
            case 3:
                $posts = $users->sortBy('created_at');
                break;
            case 4:
                $posts = $users->sortByDesc('created_at');
                break;
            case 5:
                $posts = $users->sortBy('name');
                break;
            case 6:
                $posts = $users->sortByDesc('name');
        }


        return view("posts.index", ["posts" => $posts, "sorting"=>True]);
    }


    public function myPosts(){
        {

            $posts = DB::table('posts')->where("user_id" , Auth::id())
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->select('posts.*', 'users.name')
                ->get();
            return view("posts.index", ["posts" => $posts, "sorting"=>null]);

        }


    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        request()->validate([
            "title"=>"required",
        ]);

        $post=new Post(request(['title', 'body']));
        $post->user_id=Auth::id();
        if(request()->filePath) {
            $request->filePath->store('public/userUploads');
            $post->filePath = request("filePath")->hashName();
        }
//        $post->filePath = Storage::disk('public')
//            ->put('userUploads/' . $request->filePath->getClientOriginalName(), $request->filePath);

        $post->save();
        return redirect("posts");
    }

    public function show($id)
    {
        //dd($id);

        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view("posts.post", ["post"=>$post, 'comments' => $comments]);
    }

    public function edit($id)
    {
        if(Post::find($id)->user_id == Auth::id()){
            return view ("posts.edit", ['post'=>Post::find($id)]);
        }


    }

    public function update(Request $request, $id)
    {
        request()->validate([
            "title"=>"required"
        ]);

        $post=Post::find($id);
        $post->title=$request->title;
        $post->body=$request->body;
        if($request->changeImage == True){
            $post->filePath = null;
        }
        if(request()->filePath) {
            $request->filePath->store('public/userUploads');
            $post->filePath = request("filePath")->hashName();
        }
        $post->save();
        return redirect("posts");
    }


    public function upvote(Request $request, $id){

    }

    public function destroy($id)
    {
        //
    }
}
