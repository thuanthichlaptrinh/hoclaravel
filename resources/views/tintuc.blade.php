<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css">
</head>
<body>
    <h1>View tin tuc</h1>

    <div class="container">
        {{-- Cho phép layout con có thể sửa --}}
        @yield('content')
    </div>

    {{-- <form action="/tin-tuc" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="fullname" placeholder="Fullname">
        <input type="email" name="email" placeholder="Email">
        <input type="file" name="thumd">
        <button type="submit">Submit</button>
    </form> --}}

    {{-- <form action="<?php echo route('user-get') ?>" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="fullname" placeholder="Name">
        <button type="submit">Get User Name from Session</button>
    </form> --}}

    {{-- In ra biến data được truyền bên controller --}}
    <p>Biến Data in ra là: {{ $data }}</p>

    {{-- In ra biến data được truyền bên controller theo dạng thẻ tag --}}
    <p>Biến Data in ra là: {!! $data2 !!}</p>

    {{-- Câu lệnh if else trong Blade --}}
    @if($age >= 18)
        <p>Bạn đã đủ tuổi vào trang web này</p>
    @elseif ($age >= 90)
        <p>Bạn đã quá già vào trang web này</p>
    @else
        <p>Bạn chưa đủ tuổi vào trang web này</p>
    @endif

    {{-- Vòng lặp trong Blade --}}
    @for($i = 0; $i < 10; $i ++)
        <span>{{ $i }}, </span>
    @endfor

    {{-- --}}
    <ul>
        @foreach ($tintuc as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    {{-- Foreach --}}
    @foreach ($products as $product)
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ number_format($product['price']) }} đ</td>
                        <td>{{ $product['category'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endforeach

</body>
</html>
