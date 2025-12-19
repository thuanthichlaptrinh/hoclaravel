<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ================ Service Container và Service Provider ================
Route::get('thong-bao', function() {
    $so1 = app('ThongBaoT');
    $so2 = app('ThongBaoT');
    $so3 = app('ThongBaoT');

    return $so1->index() . '<br>' . $so2->index() . '<br>' . $so3->index();
});

// ================ put và get vào cache theo cách truyền thống ================
Route::get('/cache-put', function () {
    // Lưu giá trị vào cache theo cách truyền thống
    $cache = app()->make('cache'); // lấy service từ container
    $cache->put('name', 'Nguyen Van A', 60); // thời gian là giây

    return 'Đã lưu giá trị vào cache';
});

Route::get('/cache-get', function () {
    // Lấy giá trị từ cache theo cách truyền thống
    $cache = app()->make('cache'); // lấy service từ container
    $name = $cache->get('name', 'Khong co gia tri trong cache'); // giá trị mặc định nếu không tìm thấy

    return 'Giá trị trong cache: ' . $name;
});

// ================ put và get vào cache dùng Facade ================
Route::get('/cache-put-fa', function () {
    // Lưu giá trị vào cache theo cách facade
    Cache::put('name', 'Nguyen Van B', 60); // thời gian là giây

    return 'Đã lưu giá trị vào cache';
});

Route::get('/cache-get-fa', function () {
    // Lấy giá trị từ cache theo cách facade
    $name = Cache::get('name', 'Khong co gia tri trong cache'); // giá trị mặc định nếu không tìm thấy

    return 'Giá trị trong cache: ' . $name;
});
