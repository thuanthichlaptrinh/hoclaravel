<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return 'Đây là trang chủ 3';
    }
}
