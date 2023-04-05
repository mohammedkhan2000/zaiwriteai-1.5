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
</head>

<body class="{{ selectedLanguage()->rtl == 1 ? 'direction-rtl' : 'direction-ltr' }}">
    @if (getOption('app_preloader_status') == 1)
        <div id="preloader">
            <div id="preloader-status"><img src="{{ getSettingImage('app_preloader') }}" alt="img"></div>
        </div>
    @endif
    @include('frontend.layouts.menu')
    <main data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
        tabindex="0">

        @yield('content')

        @include('frontend.layouts.footer')
    </main>
    @include('frontend.layouts.script')
</body>

</html>
