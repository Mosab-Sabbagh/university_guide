<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootsrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/student.css')}}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
</html>

<body>
    @include('student.layouts.nav')
<div class="dashboard-container">
    @include('student.layouts.rightSide')
    <div class=" main-content flex-grow-1">
        @yield('content')
    </div>
    @include('student.layouts.leftSide')
</div>
    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>

