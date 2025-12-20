<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

// ================ Tin tức ================
Route::match(['get', 'post'], '/tin-tuc', function(Request $request) {
    // Kiểm tra method post
    if($request->isMethod('post')) {
        return 'Đây là trang tin tức - method POST';
    }

    // Mặc định là method get
    return view('tintuc');
});

// Route::post('/tin-tuc', function() {
//     return view('post-new');
// })->name('post-new');

// ================ user ================
Route::get('/user', function() {
    // Lưu tên người dùng lên session
    session(['name' => 'Nguyen Van A']);
    return 'Tên hiện tại là: ' . session('name');
});

Route::put('/user', function(Request $request) {
    // Lưu tên người dùng lên session
    $newName = $request->input('fullname');
    session(['name' => $newName]);

    return 'Tên sau khi update là: ' . session('name');
})->name('user-get');

Route::get('/user/{id}', function($id) {
    return 'Người dùng có id là: ' . $id;
});

Route::get('/user/{id}/{type}', function($id, $type) {
    return 'Người dùng có id là: ' . $id . '</br>' . 'Type: ' . $type;
});

// ================ HomeController ================
// Route::get('/home', [HomeController::class, 'index']);

// Gom nhóm route chung controller HomeController
Route::controller(HomeController::class)->group(function() {
    Route::get('/home', 'index');
    Route::get('/home2', 'index2');
    Route::get('/home3', 'index3');
});

// admin/user/{id}
// admin/dashboard
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/user/{id}', function($id) {
        return 'Route User - Admin: ' . $id;
    });

    Route::get('/dashboard', function() {
        return 'Route Route dashboard - Admin';
    });
});

// ================ Bài 11. Middleware ================
Route::get('/kiem-tra', function() {
    return 'Bạn đã đủ tuổi truy cập trang này';
});

Route::get('/kiem-tra/{age}', function() {
    return 'ok';
})->name('test-age')->middleware('check.age');

// ================ Bài 12. Controller & View ================
Route::controller(ProductController::class)->group(function() {
    Route::get('/product/{soluong}', 'soluong');
    Route::get('/product/danhsach/{ds}', 'danhsach');
});
