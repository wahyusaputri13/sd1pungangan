<!-- Favicons -->
@if($data_website->favicon == 'assets/pemda.ico')
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('') }}{{ $data_website->favicon }}" />
@else
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
@endif

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
  rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('assets/front/herobiz/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/herobiz/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/herobiz/assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/herobiz/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/herobiz/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Variables CSS Files. Uncomment your preferred color scheme -->
<link href="{{ asset('assets/front/herobiz/assets/css/variables.css') }}" rel="stylesheet">
<!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
<!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
<!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
<!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
<!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
<!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

<!-- Template Main CSS File -->
<link href="{{ asset('assets/front/herobiz/assets/css/main.css') }}" rel="stylesheet">

<!-- datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<!-- =======================================================
  * Template Name: HeroBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->