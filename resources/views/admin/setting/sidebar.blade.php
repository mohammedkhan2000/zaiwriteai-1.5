<div class="col-md-12 col-lg-12 col-xl-4 col-xxl-3">
    <div class="account-settings-leftside bg-white theme-border radius-4 p-20 mb-25">

        <div class="tenants-details-leftsidebar-wrap d-flex">
            <ul class="account-settings-menu list-group">
                <li class="mt-25">
                    <b>{{ __('General Setting') }}</b>
                </li>
                <li>
                    <a href="{{ route('admin.setting.general-setting') }}"
                        class="account-settings-menu-item {{ @$subGeneralSettingActiveClass }}">
                        <span class="iconify" data-icon="carbon:settings"></span>{{ __('Basic Setting') }}
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.setting.color-setting') }}"
                        class="account-settings-menu-item {{ @$subColorSettingActiveClass }}">
                        <span class="iconify"
                            data-icon="fluent:color-background-24-regular"></span>{{ __('Color Setting') }}
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('admin.language.index') }}"
                        class="account-settings-menu-item {{ @$subLanguageActiveClass }}">
                        <span class="iconify" data-icon="clarity:language-line"></span>{{ __('Language') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.gateway.index') }}"
                        class="account-settings-menu-item {{ @$subGatewaySettingActiveClass }}">
                        <span class="iconify" data-icon="fluent:payment-16-regular"></span>{{ __('Payment Gateway') }}
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.setting.user.index') }}" class="account-settings-menu-item {{ @$subUserActiveClass }}">
                        <span class="iconify" data-icon="carbon:user-role"></span>{{__('All Users')}}
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('admin.setting.ticket-topic.index') }}"
                        class="account-settings-menu-item {{ @$subTicketTopicActiveClass }}">
                        <span class="iconify" data-icon="bi:bookmark-dash"></span>{{ __('Tickets Topic') }}
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('admin.setting.smtp.setting') }}"
                        class="account-settings-menu-item {{ @$subSmtpSettingActiveClass }}">
                        <span class="iconify" data-icon="mdi:git-issue"></span>{{ __('SMTP Setting') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.chat-gpt-api') }}"
                        class="account-settings-menu-item {{ @$subChatGPTApiSettingActiveClass }}">
                        <span class="iconify" data-icon="mdi:git-issue"></span>{{ __('OpenAI API Setting') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.google-analytics') }}"
                        class="account-settings-menu-item {{ @$subGoogleAnalyticsSettingActiveClass }}">
                        <span class="iconify" data-icon="mdi:git-issue"></span>{{ __('Google Analytics') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.storage.link') }}" class="account-settings-menu-item">
                        <span class="iconify" data-icon="mdi:git-issue"></span>{{ __('Storage Link') }}
                    </a>
                </li>
                <li class="mt-25">
                    <b>{{ __('Landing Page Setting') }}</b>
                </li>
                <li>
                    <a href="{{ route('admin.home-setting.section') }}"
                        class="account-settings-menu-item {{ @$subHomeSectionSettingActiveClass }}">
                        <span class="iconify" data-icon="carbon:settings"></span>{{ __('Section Show/Hide') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.brand.index') }}"
                        class="account-settings-menu-item {{ @$subBrandActiveClass }}">
                        <span class="iconify" data-icon="carbon:settings"></span>{{ __('Brand Management') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.how-it-work.index') }}"
                        class="account-settings-menu-item {{ @$subHowItWorkActiveClass }}">
                        <span class="iconify" data-icon="carbon:settings"></span>{{ __('How It Work') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.testimonials.index') }}"
                        class="account-settings-menu-item {{ @$subTestimonialsActiveClass }}">
                        <span class="iconify" data-icon="carbon:settings"></span>{{ __('Testimonials') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.faq.index') }}"
                        class="account-settings-menu-item {{ @$subFaqActiveClass }}">
                        <span class="iconify" data-icon="carbon:settings"></span>{{ __('Faq') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
