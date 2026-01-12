<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request) {
        // $fullname = $request->input('fullname');
        // $email = $request->input('email');

        // $data = $request->all();

        // $checkFullname = $request->has('fullname'); // kiểm tra tồn tại

        // $checkMethod = $request->method(); // lấy method

        // return 'Full name: ' . $data['fullname'] . '<br>Email: ' . $data['email'];

        // if($request->hasFile('thumd')) {
        //     $path = $request->file('thumd')->store('images', 'public');
        //     return 'Đã upload file thành công. Đường dẫn: ' . $path;
        // }
        // return 'Chưa có file upload';

        $validated = $request->validate([
            'fullname' => 'required|string|min:5|max:40',
            'email' => 'required|email',
            'thumd' => 'required|file|mimes:jpg,png|max:2048',
        ]);

        return 'Dữ liệu hợp lệ';
    }

    public function index2(Request $request) {
        $data = 'test blade';
        $data2 = '<strong>Thuan</strong>';
        $age = 18;
        $tintuc = [
            'title' => 'Tiêu đề bài viết',
            'content' => 'Nội dung bài viết'
        ];

        $products = [
            [
                'name' => 'iPhone 13',
                'price' => 20000000,
                'category' => 'Điện thoại'
            ]
        ];

        return view('tintuc',
            ['data' => $data, 'data2' => $data2, 'age' => $age, 'tintuc' => $tintuc, 'products' => $products]);
    }

    // public function index2(Request $request) {
    //     $query = $request->query('key');

    //     return 'Tìm kiếm với keyword là: ' . $query;
    // }

    public function index3() {
        $data = 'test blade';
        $data2 = '<strong>Thuan</strong>';
        $age = 18;
        $tintuc = [
            'title' => 'Tiêu đề bài viết',
            'content' => 'Nội dung bài viết'
        ];

        $products = [
            [
                'name' => 'iPhone 13',
                'price' => 20000000,
                'category' => 'Điện thoại'
            ]
        ];

        return view('parts.blog',
    ['data' => $data, 'data2' => $data2, 'age' => $age, 'tintuc' => $tintuc, 'products' => $products]);
    }

    public function getUser() {
        // Sử dụng SQL thuần
        // $rel = DB::select("select * from users where id = 1");

        // Query Builder
        $rel = DB::table('users')->where('id', 2)->first();

        echo '<pre>';
        print_r($rel);
        echo '</pre>';
    }

    public function getUsers(){
        // Sử dụng SQL thuần
        // $ds = DB::select("select * from users");

        // Query Builder
         $ds = DB::table('users')->orderBy('created_at', 'desc')->get();
        //$ds = DB::table('users')->limit(2)->offset(1)->get();

        echo '<pre>';
        print_r($ds);
        echo '</pre>';
    }

    public function insertUser(){
        $datet = date('Y-m-d H:i:s');

        // Sử dụng SQL thuần
        // $result = DB::insert("INSERT INTO users (id, fullname, email, created_at) VALUES (4, 'vanc', 'vanc@gmail.com', '$datet')");

        // Query Builder
        $result = DB::table(('users'))->insert([
            'id' => 5,
            'fullname' => 'Nguyen Van D',
            'email' => 'fa@gmail.com',
            'created_at' => $datet
        ]);

        echo $result ? 'Thêm thành công' : 'Thêm thất bại';
    }

    public function updateUser() {
        // Sử dụng SQL thuần
        // $result = DB::update("UPDATE users SET fullname = 'Nguyen Van C' WHERE id = 3");

        // Query Builder
        $result = DB::table('users')->where('id', 5)->update([
            'email' => 'vand@gmail.com'
            //...
        ]);

        echo $result ? 'Cập nhật thành công' : 'Cập nhật thất bại';
    }

    public function deleteUser() {
        // Sử dụng SQL thuần
        // $result = DB::delete("DELETE FROM users WHERE id = 4");

        // Query Builder
        $result = DB::table("users")->where('id', 5)->delete();

        echo $result ? 'Xóa thành công' : 'Xóa thất bại';
    }

}
