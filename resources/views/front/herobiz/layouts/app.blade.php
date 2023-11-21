<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.herobiz.includes.meta')
    @stack('before-style')
    @include('front.herobiz.includes.style')
    @stack('after-style')
</head>

<body>
    @include('sweetalert::alert')
    @include('front.herobiz.includes.header')
    @yield('content')
    @include('front.herobiz.includes.footer')
    @stack('before-script')
    @include('front.herobiz.includes.script')
    @stack('after-script')

</body>

</html>