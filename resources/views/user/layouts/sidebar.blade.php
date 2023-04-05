<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled side-menu">
                <li class="dashboard-menu-item">
                    <a href="{{ route('user.dashboard') }}">
                        <span class="iconify" data-icon="radix-icons:dashboard"></span>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <span class="iconify" data-icon="fluent:document-text-24-regular"></span>
                        <span>{{ __('Templates') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('user.content.list') }}">
                                <span class="iconify" data-icon="carbon:template"></span>
                                {{ __('All Template') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.content.favorite') }}">
                                <span class="iconify" data-icon="ph:star"></span>
                                {{ __('Favorite') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <span class="iconify" data-icon="material-symbols:dock-to-bottom-outline"></span>
                        <span>{{ __('Content') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('user.content.trash') }}">
                                <span class="iconify" data-icon="ph:trash"></span>
                                {{ __('Trash') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.content.like') }}">
                                <span class="iconify" data-icon="uiw:like-o"></span>
                                {{ __('Liked') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.content.dislike') }}">
                                <span class="iconify" data-icon="uiw:dislike-o"></span>
                                {{ __('Disliked') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('user.content.history') }}">
                        <span class="iconify" data-icon="ph:clock-counter-clockwise-bold"></span>
                        <span>{{ __('History') }}</span>
                    </a>
                </li>
            </ul>

            <ul class="metismenu list-unstyled side-menu">
                @if (auth()->user()->role == USER_ROLE_USER)
                    <li class="subscription-menu-item">
                        <a href="{{ route('user.subscription.index') }}">
                            <span class="iconify" data-icon="ri:exchange-dollar-line"></span>
                            <span>{{ __('My Subscription') }}</span>
                        </a>
                    </li>
                @endif
                <li class="logout-menu-item">
                    <a href="{{ route('logout') }}">
                        <span class="iconify" data-icon="heroicons-outline:logout"></span>
                        <span>{{ __('Log Out') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
