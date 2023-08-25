<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="container mt-3">
        @error('errors')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        @if (session()->get('logged'))
            <a href="{{ route('logout') }}" class="btn btn-success">LOG OUT</a>
        @else
            <h1>anda belum login</h1>
            silahkan login
            <a href="{{ route('login') }}" class="btn btn-success">Login</a>
            atau
            <a href="{{ route('register_form') }}" class="btn btn-primary ">Register</a>
        @endif
        @yield('content')
    </div>
</body>

</html>
