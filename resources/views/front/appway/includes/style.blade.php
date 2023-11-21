<!-- Favicons -->
@if($data_website->favicon == 'assets/pemda.ico')
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('') }}{{ $data_website->favicon }}" />
@else
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
@endif
<!-- ========== Google Fonts ========== -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap"
  rel="stylesheet">

<!-- Stylesheets -->
<link href="{{ asset('assets/front/appway/css/font-awesome-all.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/appway/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/appway/css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/appway/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/appway/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/appway/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/appway/css/imagebg.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/appway/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/appway/css/responsive.css') }}" rel="stylesheet">

<!-- ambil dari template lain -->
<link href="{{ asset('assets/front/arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">