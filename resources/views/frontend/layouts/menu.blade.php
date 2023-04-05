<section class="menu-section-area">
    <!-- Navigation -->
    <nav class="navbar sticky-header navbar-expand-lg" aria-label="Dark offcanvas navbar" id="mainNav">
        <div class="container">
            <a class="navbar-brand mobile-navbar-brand" href="{{ route('frontend') }}">
                <img class="img-fluid" src="{{ getSettingImage('app_logo') }}" alt="{{ getOption('app_name') }}">
            </a>

            <div class="navbar-right-mobile">

                <div class="dropdown d-inline-block language-dropdown me-2">
                    <button type="button" class="header-item noti-icon" id="page-header-languages-dropdown-mobile"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset(selectedLanguage()->icon) }}" alt="{{ selectedLanguage()->name ?? 'English' }}"
                            title="{{ selectedLanguage()->name ?? 'English' }}" class="rounded-circle avatar-xs fit-image">
                    </button>

                    <div class="dropdown-menu {{ selectedLanguage()->rtl == 1 ? 'dropdown-menu-start' : 'dropdown-menu-end' }}"
                        aria-labelledby="page-header-languages-dropdown-mobile">
                        <div>
                            @foreach (languages() as $language)
                                <a href="{{ route('local', $language->code) }}" class="dropdown-item" title="EN">
                                    <div class="d-flex">
                                        <img src="{{ $language->icon }}" class="me-3 rounded-circle avatar-xs"
                                            alt="user-pic">
                                        <div class="flex-1">{{ $language->name }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
                    <span class="iconify" data-icon="heroicons-outline:menu"></span>
                </button>

            </div>

            <div class="offcanvas {{ selectedLanguage()->rtl == 1 ? 'offcanvas-start' : 'offcanvas-end' }}" tabindex="-1" id="offcanvasNavbarDark"
                aria-labelledby="offcanvasNavbarDarkLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel">
                        <img class="img-fluid" src="{{ getSettingImage('app_logo_black') }}"
                            alt="{{ getOption('app_name') }}">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="col-lg-2 col-xl-2">
                        <a class="navbar-brand desktop-navbar-brand" href="{{ route('frontend') }}">
                            <img class="img-fluid" src="{{ getSettingImage('app_logo') }}"
                                alt="{{ getOption('app_name') }}">
                        </a>
                    </div>
                    <ul class="navbar-nav mb-lg-0 col-lg-6 col-xl-7 navbar-nav-middle">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="{{ route('frontend') }}#feature"><span>{{ __('Feature') }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('frontend') }}#faqs"><span>{{ __('Faqs') }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('frontend') }}#pricing"><span>{{ __('Pricing') }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('frontend') }}#how-it-works"><span>{{ __('How Its Works') }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.us') }}"><span>{{ __('Contact') }}</span></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-lg-0 col-lg-4 col-xl-3 navbar-nav-right">
                        <li class="nav-item navbar-login-btn">
                            @guest
                                <a href="{{ route('login') }}" class="nav-link"><span>{{ __('Sign In') }}</span></a>
                            @endguest
                            @auth
                                @if (auth()->user()->role == USER_ROLE_USER)
                                    <a href="{{ route('user.dashboard') }}"
                                        class="nav-link"><span>{{ __('Dashboard') }}</span></a>
                                @else
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="nav-link"><span>{{ __('Dashboard') }}</span></a>
                                @endif
                            @endauth
                        </li>
                        <li class="nav-item header-get-free-trial-btn">
                            @guest
                                <a href="{{ route('register') }}" class="theme-btn-outline">{{ __('Get Free Trial') }}</a>
                            @endguest
                        </li>

                        <div class="dropdown d-inline-block language-dropdown">
                            <button type="button" class="header-item noti-icon" id="page-header-languages-dropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset(selectedLanguage()->icon) }}" alt="{{ selectedLanguage()->name ?? 'English' }}"
                                    title="{{ selectedLanguage()->name ?? 'English' }}" class="rounded-circle avatar-xs fit-image">
                            </button>

                            <div class="dropdown-menu {{ selectedLanguage()->rtl == 1 ? 'dropdown-menu-start' : 'dropdown-menu-end' }}"
                                aria-labelledby="page-header-languages-dropdown">
                                <div>
                                    @foreach (languages() as $language)
                                        <a href="{{ route('local', $language->code) }}" class="dropdown-item" title="EN">
                                            <div class="d-flex">
                                                <img src="{{ $language->icon }}" class="me-3 rounded-circle avatar-xs"
                                                    alt="user-pic">
                                                <div class="flex-1">{{ $language->name }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navigation -->
</section>
