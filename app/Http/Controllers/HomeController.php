<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        return 'Đây là trang chủ';
    }

    public function index2() {
        return 'Đây là trang chủ 2 ';
    }

    public function index3() {
        return 'Đây là trang chủ 3';
    }
}
