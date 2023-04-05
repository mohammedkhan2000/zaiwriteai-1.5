<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="{{ getOption('app_name') }}">
    <meta name="description" content="{{ getOption('meta_description') }}">
    <meta name="keywords" content="{{ getOption('meta_keyword') }}">
    <meta name="author" content="{{ getOption('meta_author') }}">

    <meta property="og:type" content="Property">
    <meta property="og:title" content="{{ getOption('app_name') }}">
    <meta property="og:description" content="{{ getOption('meta_description') }}">
    <meta property="og:image" content="{{ getSettingImage('app_logo') }}">

    <meta name="twitter:card" content="{{ getOption('app_name') }}">
    <meta name="twitter:title" content="{{ getOption('app_name') }}">
    <meta name="twitter:description" content="{{ getOption('meta_description') }}">
    <meta name="twitter:image" content="{{ getSettingImage('app_logo') }}">

    <meta name="msapplication-TileImage" content="{{ getSettingImage('app_logo') }}">

    <meta name="msapplication-TileColor" content="#F8F8F8">
    <meta name="theme-color" content="#3686FC">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ getOption('app_name') . ' - ' . @$pageTitle }}</title>

    @if(getOption('analytics_enable', 0))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ getOption('google_analytics_measurement_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', "{{ getOption('google_analytics_measurement_id') }}");
    </script>
    @endif

    @include('user.layouts.style')
    @stack('style')
</head>

<body class="{{ selectedLanguage()->rtl == 1 ? 'direction-rtl' : 'direction-ltr' }}">

    @if (getOption('app_preloader_status') == 1)
        <div id="preloader">
            <div id="preloaderInner"><img src="{{ getSettingImage('app_preloader') }}" alt="img"></div>
        </div>
    @endif

    <div id="layout-wrapper">
        @include('user.layouts.header')
        @include('user.layouts.sidebar')
        @yield('content')
    </div>

    @include('user.layouts.modal')

    @include('user.layouts.script')

    <!-- App Custom js -->
    <script src="{{ asset('user/assets/js/custom.js') }}"></script>
    @stack('script')
</body>

</html>
