<?php

namespace App\Http\Controllers;

use App\Events\SendPostMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index() {
        $posts = DB::table("posts")
            ->join("users", "posts.user_id", "=", "users.id")
            ->select("posts.title AS Title",
                "posts.id AS id",
                "posts.content AS Content",
                "posts.images AS Images",
                "posts.user_id AS userId",
                "users.name AS Author")
            ->get();
        return view("dash.posts.index", ['posts' => $posts]);
    }

    public function create() {
        return view("dash.posts.create");
    }

    public function store(Request $request) {
        $image_list = [];

        foreach ($request->file("images") as $image) {
            $ext = $image->extension();
            $new_name = "post_" . time() . "." . $ext;
            $image->move(public_path("assets/uploads"), $new_name);
            $image_list = $new_name;
        }

        $data = [
            "title" => $request['title'],
            "content" => $request['content'],
            "images" => json_encode($image_list),
            "user_id" => Auth::user()->id
        ];

        $store = Post::create($data);

        if($store) {
            event(new SendPostMail(
                Auth::user()->name,
                Auth::user()->email,
                $data['title']
            ));
        }
    }

    public function edit($id) {

    }

    public function update(Request $request) {

    }

    public function my_posts() {
        $posts = DB::table("posts")
            ->join("users", "posts.user_id", "=", "users.id")
            ->select("posts.title AS Title",
                "posts.id AS id",
                "posts.content AS Content",
                "posts.images AS Images",
                "posts.user_id AS userId",
                "users.name AS Author")
            ->where("posts.user_id", "=", Auth::user()->id)
            ->get();

        return $posts;
//        return view("dash.posts.index", ['posts' => $posts]);
    }
}
