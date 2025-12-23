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

{{-- Component có truyền class --}}
<x-alert type="success">
    <x-slot name="message">Đăng ký thành công!</x-slot>
</x-alert>

<x-alert type="danger">
    <x-slot name="message">Đăng ký không thành công!</x-slot>
</x-alert>

<x-alert type="warning">
    <x-slot name="message">Cảnh báo!</x-slot>
</x-alert>

{{-- Component không truyền class --}}
<x-message>
    Đây là message component
</x-message>
