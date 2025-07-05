<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootsrap.css') }}"> --}}
    </head>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        background: #f7fafd;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-card {
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
        max-width: 400px;
        width: 100%;
        padding: 40px 32px 32px 32px;
        direction: rtl;
        margin: 0 auto;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        margin-bottom: 16px;
        background: #f7fafd;
        border: 1px solid #e0e0e0;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 4px;
    }

    .register-btn {
        width: 100%;
        border-radius: 10px;
        font-size: 1rem;
        padding: 6px 0;
    }
</style>

<html>

<body>
    <div class="register-card">
        @yield('form')
        </div>
</body>
</html>