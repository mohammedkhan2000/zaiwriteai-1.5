  <!-- Footer Start -->
  <footer class="footer-area position-relative">
      <img src="{{ asset('frontend/assets/img/page-banner-img/page-banner-bg.webp') }}"
          class="footer-bg-img theme-common-floating-bg-img position-absolute img-fluid">
      <div class="container position-relative">
          <!-- footer-widget-area -->
          <div class="row footer-top-part">
              <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                  <div class="footer-widget footer-about">
                      <a href="{{ route('frontend') }}"><img src="{{ getSettingImage('app_logo') }}" alt="Logo"></a>
                      <address class="big-para">
                          <p>{{ getOption('app_footer_text') }}</p>
                      </address>
                      <div class="footer-social mt-30">
                          <ul class="d-flex align-items-center">
                              @if (getOption('facebook_url'))
                                  <li><a href="{{ getOption('facebook_url') }}"><span class="iconify"
                                              data-icon="brandico:facebook"></span></a></li>
                              @endif
                              @if (getOption('twitter_url'))
                                  <li><a href="{{ getOption('twitter_url') }}"><span class="iconify"
                                              data-icon="akar-icons:twitter-fill"></span></a></li>
                              @endif
                              @if (getOption('linkedin_url'))
                                  <li><a href="{{ getOption('linkedin_url') }}"><span class="iconify"
                                              data-icon="jam:linkedin"></span></a></li>
                              @endif
                              @if (getOption('skype_url'))
                                  <li><a href="{{ getOption('skype_url') }}"><span class="iconify"
                                              data-icon="ant-design:skype-filled"></span></a></li>
                              @endif
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                  <div class="footer-widget">
                      <h5 class="footer-widget-title font-bold">{{ __('Product') }}</h5>
                      <div class="footer-links d-flex">
                          <ul>
                              <li><a href="{{ route('frontend') }}#pricing">{{ __('Pricing') }}</a></li>
                              <li><a href="{{ route('user.dashboard') }}">{{ __('User Dashboard') }}</a></li>
                              <li><a href="{{ route('frontend') }}#brand">{{ __('Our Customers') }}</a></li>
                              <li><a href="{{ route('frontend') }}#faqs">{{ __('Faq') }}</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                  <div class="footer-widget">
                      <h5 class="footer-widget-title font-bold">{{ __('Pages') }}</h5>
                      <div class="footer-links d-flex">
                          <ul>
                              <li><a href="{{ route('pages', 'privacy_policy') }}">{{ __('Privacy Policy') }}</a></li>
                              <li><a
                                      href="{{ route('pages', 'terms_and_condition') }}">{{ __('Terms & Conditions') }}</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                  <div class="footer-widget">
                      <h5 class="footer-widget-title font-bold">{{ __('Support') }}</h5>
                      <div class="footer-links d-flex">
                          <ul>
                              @auth
                                  <li><a href="{{ route('logout') }}">{{ __('Sign Out') }}</a></li>
                              @else
                                  <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                              @endauth
                              <li><a href="{{ route('contact.us') }}">{{ __('Contact Us') }}</a></li>
                              <li><a href="{{ route('frontend') }}#how-it-works">{{ __('About Us') }}</a></li>
                              <li><a href="{{ route('frontend') }}#how-it-works">{{ __('How Its Works') }}</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="copyright-wrapper">
          <div class="container">
              <!--copyright-text-->
              <div class="row">
                  <div class="col-12 col-md-12">
                      <div class="copyright-text text-center">
                          <p>{{ getOption('app_copyright') }}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- Footer End -->
