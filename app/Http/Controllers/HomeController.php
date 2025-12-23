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

    public function getUsers(){
        $ds = DB::select("select * from users"); // Lấy danh sách user từ bảng users - sử dụng SQL thuần

        echo '<pre>';
        print_r($ds);
        echo '</pre>';
    }

    public function insertUser(){
        $datet = date('Y-m-d H:i:s');

        $result = DB::insert("INSERT INTO users (id, fullname, email, create_at) VALUES (4, 'vanc', 'vanc@gmail.com', '$datet')");

        echo $result ? 'Thêm thành công' : 'Thêm thất bại';
    }

    public function updateUser() {
        $result = DB::update("UPDATE users SET fullname = 'Nguyen Van C' WHERE id = 3");

        echo $result ? 'Cập nhật thành công' : 'Cập nhật thất bại';
    }

    public function deleteUser() {
        $result = DB::delete("DELETE FROM users WHERE id = 4");

        echo $result ? 'Xóa thành công' : 'Xóa thất bại';
    }

}
