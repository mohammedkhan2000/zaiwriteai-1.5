<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if (auth()->user()->role == USER_ROLE_ADMIN)
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="ri-dashboard-line"></i>
                            <span>{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="ri-wallet-line"></i>
                            <span>{{ __('Category') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.category.index') }}">
                                    {{ __('Category') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.sub-category.index') }}">
                                    {{ __('Sub Category') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="ri-wallet-line"></i>
                            <span>{{ __('Subscription') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li class="">
                                <a href="{{ route('admin.subscriptions.orders') }}"
                                    class="">{{ __('All Orders') }}</a>
                            </li>
                            <li class="">
                                <a href="{{ route('admin.packages.user') }}"
                                    class="">{{ __('User Packages') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.packages.index') }}">
                            <i class="ri-bookmark-2-line"></i>
                            <span>{{ __('Packages') }}</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('admin.ticket.index') }}">
                            <i class="ri-bookmark-2-line"></i>
                            <span>{{ __('Tickets') }}</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('admin.setting.general-setting') }}">
                            <i class="ri-settings-3-line"></i>
                            <span>{{ __('Settings') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.list') }}">
                            <i class="ri-bookmark-2-line"></i>
                            <span>{{ __('Users') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="ri-account-circle-line"></i>
                            <span>{{ __('Profile') }}</span>
                        </a>
                        <ul class="sub-menu {{ @$navProfileMMShowClass }}" aria-expanded="false">
                            <li class="{{ @$subNavProfileMMActiveClass }}"><a class="{{ @$subNavProfileActiveClass }}"
                                    href="{{ route('admin.profile') }}">{{ __('My Profile') }}</a></li>
                            <li><a href="{{ route('admin.change-password') }}">{{ __('Change Password') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.file-version-update') }}">
                            <i class="ri-refresh-line"></i>
                            <span>{{ __('Version Update') }}</span>
                        </a>
                    </li>
                @endif
                <li class="font-semi-bold mt-20 text-center text-info">
                    <a href="">
                        <span>
                            {{ __('Current Version') }} :
                        </span>
                        {{ getOption('current_version', 'v1.1') }}
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
