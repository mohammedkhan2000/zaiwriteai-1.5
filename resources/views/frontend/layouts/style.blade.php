<!--=======================================
      All Css Style link
    ===========================================-->

<!-- Bootstrap core CSS -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

<link href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}" rel="stylesheet">

<!-- Custom fonts for this template -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Animate Css-->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">

<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/icons.min.css') }}">

<!-- Custom styles for this template -->
<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

<!-- RTL Style Start -->
@if (selectedLanguage()->rtl == 1)
    <link href="{{ asset('frontend/assets/css/rtl-style.css') }}" rel="stylesheet">
@endif
<!-- RTL Style End -->

<!-- Responsive Css-->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
@stack('style')
