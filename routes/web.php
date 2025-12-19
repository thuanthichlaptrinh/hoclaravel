<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('thong-bao', function() {
    $so1 = app('ThongBaoT');
    $so2 = app('ThongBaoT');
    $so3 = app('ThongBaoT');

    return $so1->index() . '<br>' . $so2->index() . '<br>' . $so3->index();
});
