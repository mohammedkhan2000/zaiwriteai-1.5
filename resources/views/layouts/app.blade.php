<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.meta')

    <title>@stack('title' ?? '') {{ getOption('app_name') }}</title>

    @include('frontend.layouts.style')

    <!-- FAVICONS -->
    <link rel="icon" href="{{ getSettingImage('app_fav_icon') }}.png" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="{{ getSettingImage('app_fav_icon') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ getSettingImage('app_fav_icon') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    @stack('style')
</head>

<body>
    @if (getOption('app_preloader_status') == 1)
        <div id="preloader">
            <div id="preloader-status"><img src="{{ getSettingImage('app_preloader') }}" alt="img"></div>
        </div>
    @endif

    @yield('content')

    @include('frontend.layouts.script')
</body>

</html>
