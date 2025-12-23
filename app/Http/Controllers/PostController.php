<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getPosts() {
        // $result = Post::all();
        //$result = Post::orderBy('id', 'DESC')->take(2)->get()->toArray(); // sắp xếp giảm dần theo id, lấy 2 record, chuyển thành mảng
        $result = Post::skip(2)->take(2)->get()->toArray(); // bỏ qua 2 record, lấy 2 record tiếp theo, chuyển thành mảng

        dd($result);
    }

    public function getPost(){
        // $result = Post::find(1);
        $result = Post::where('id', 2)->get()->toArray();

        dd($result);
    }

    public function insertPost() {
        // $result = new Post();
        // $result->id = 6;
        // $result->name = 'Bài viết 6';
        // $result->content = 'Nội dung bài viết 6';
        // $result->save();

        $result = Post::create([
            'id' => 7,
            'name' => 'Bài viết 7',
            'content' => 'Nội dung bài viết 7',
        ]);

        dd($result);
    }

    public function updatePost() {
        $result = Post::where('id', 3)->update(['name' => 'Bài viết 3 cập nhật']);
        dd($result);
    }

    public function deletePost() {
        // $result = Post::find(3)->delete();
        $result = Post::destroy(4);

        dd($result);
    }

}
