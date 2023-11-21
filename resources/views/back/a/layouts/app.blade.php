<!DOCTYPE html>
<html lang="en">

<head>
    @include('back.a.includes.meta')

    <title>{{ $data_website->web_name }}</title>

    @stack('before-style')
    @include('back.a.includes.style')
    @stack('after-style')
</head>

<body>
    @auth
    @include('back.a.includes.header')
    @endauth
    @yield('content')
    @include('back.a.includes.footer')
    @stack('before-script')
    @include('back.a.includes.script')
    @stack('after-script')

</body>

</html>