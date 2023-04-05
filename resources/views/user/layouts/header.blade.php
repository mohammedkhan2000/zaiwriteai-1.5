<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex align-items-center">
            <div class="navbar-brand-box">
                <a href="{{ auth()->user()->role == USER_ROLE_ADMIN ? route('admin.dashboard') : route('user.dashboard') }}"
                    class="logo logo-light">
                    <img class="light-logo" src="{{ getSettingImage('app_logo_black') }}"
                        alt="{{ getOption('app_name') }}">
                    <img class="dark-logo" src="{{ getSettingImage('app_logo') }}" alt="{{ getOption('app_name') }}">
                </a>
            </div>
            <button type="button" class="btn-sm px-3 font-24 header-item" id="vertical-menu-btn">
                <i class="ri-indent-decrease"></i>
            </button>
            <!-- App Search-->
            {{-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search Here">
                    <span class="ri-search-line"></span>
                </div>
            </form> --}}

            @include('user.layouts.header-plan-message')
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2 mobile-search-dropdown d-none">
                <button type="button" class="header-item noti-icon" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="m-0">
                            <div class="input-group radius-4">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="mobile-search-btn">
                                    <button class="bg-primary-color text-white h-100 px-3" type="submit"><i
                                            class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="nav-item mode-change">
                <a class="header-item zai-theme-customizer-container-body-item-svg theme-light active"
                    data-theme="light" title="Go Light Mode">
                    <span class="iconify" data-icon="fluent:brightness-low-28-regular"></span>
                </a>
                <a class="header-item zai-theme-customizer-container-body-item-svg theme-dark" data-theme="dark"
                    title="Go Dark Mode">
                    <span class="iconify" data-icon="fluent:brightness-low-28-filled"></span>
                </a>
            </div>

            <div class="dropdown d-inline-block">
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

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="header-item noti-icon" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle avatar-xs fit-image header-profile-user"
                        src="{{ auth()->user()->image }}">
                    <span class="user-name d-none d-xl-inline-block font-medium">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-xl-inline-block font-17"></i>
                </button>
                <div class="dropdown-menu {{ selectedLanguage()->rtl == 1 ? 'dropdown-menu-start' : 'dropdown-menu-end' }}" aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="{{ route('user.profile') }}"><span class="iconify font-16 me-1"
                            data-icon="ri:user-3-line"></span> {{ __('Profile') }}</a>
                    <a class="dropdown-item" href="{{ route('user.change-password') }}"><span
                            class="iconify font-16 me-1" data-icon="material-symbols:key-outline"></span>
                        {{ __('Change Password') }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"><span class="iconify font-16 me-1"
                            data-icon="heroicons-outline:logout"></span> {{ __('Logout') }}</a>
                </div>
            </div>
        </div>
    </div>
</header>
