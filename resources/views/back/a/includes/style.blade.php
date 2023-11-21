@if($data_website->favicon == 'assets/pemda.ico')
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('') }}{{ $data_website->favicon }}" />
@else
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
@endif
<!-- Canonical SEO -->
<link rel="canonical" href="//www.creative-tim.com/product/material-dashboard-pro" />
<!--  Social tags      -->
<!-- Bootstrap core CSS     -->
<link href="{{ asset('assets/back/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<!--  Material Dashboard CSS    -->
<link href="{{ asset('assets/back/assets/css/material-dashboard.css') }}" rel="stylesheet" />
<!--  CSS for Demo Purpose, don't include it in your project     -->
<link href="{{ asset('assets/back/assets/css/demo.css') }}" rel="stylesheet" />
<!--     Fonts and icons     -->
<link href="{{ asset('assets/back/assets/css/font-awesome.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/back/assets/css/google-roboto-300-700.css') }}" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />