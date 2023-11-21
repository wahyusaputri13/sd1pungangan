<!-- Favicons -->
@if($data_website->favicon == 'assets/pemda.ico')
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('') }}{{ $data_website->favicon }}" />
@else
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
@endif
<!-- ========== Favicon Icon ========== -->
<link rel="shortcut icon" href="{{ asset('assets/front/anada/assets/img/favicon.png') }}" type="image/x-icon">

<!-- ========== Start Stylesheet ========== -->
<link href="{{ asset('assets/front/anada/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/front/anada/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/front/anada/assets/css/themify-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/front/anada/assets/css/flaticon-set.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/front/anada/assets/css/magnific-popup.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/front/anada/assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/front/anada/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/front/anada/assets/css/animate.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/front/anada/assets/css/bootsnav.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/front/anada/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/anada/assets/css/responsive.css') }}" rel="stylesheet" />
<!-- ========== End Stylesheet ========== -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="assets/js/html5/html5shiv.min.js"></script>
  <script src="assets/js/html5/respond.min.js"></script>
  <![endif]-->

<!-- ========== Google Fonts ========== -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">

<!-- ambil dari template lain fix share icon -->
<link href="{{ asset('assets/front/arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">