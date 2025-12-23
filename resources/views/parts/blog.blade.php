@extends('tintuc')

@section('title', 'Đây là trang blog')

@section('content')
    <h1>Điền vào form dưới đây</h1>

    <form action="/tin-tuc" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="fullname" placeholder="Fullname">
        <input type="email" name="email" placeholder="Email">
        <input type="file" name="thumd">
        <button type="submit">Submit</button>
    </form>
@endsection
