@if (auth()->user()->role == USER_ROLE_USER && is_null(auth()->user()->currentPlan))
    <!-- App Alert Start -->
    <div class="price-alert-box flex-wrap alert alert-success d-flex align-items-center justify-content-between mb-0"
        role="alert">
        <div class="d-inline-flex flex-grow-1 me-3">
            <span
                class="alert-info-btn d-inline-flex flex-shrink-0 align-items-center justify-content-center font-20 me-2"><span
                    class="iconify" data-icon="prime:info"></span></span>
            @if (auth()->user()->trailPlan)
                <p class="text-black flex-grow-1">
                    {{ __('You are currently on trial period. Your trial ends in') . ' ' . getOption('trail_duration', 1) . ' ' . __('days') }}
                @else
                <p class="text-black flex-grow-1">{{ __('Your trial period has expired. Please subscribe a new plan') }}
            @endif
            </p>
        </div>
        <button type="button" class="alert-link flex-shrink-0" id="chooseAPlan"
            title="{{ __('Choose a plan') }}">{{ __('Choose a plan') }}</button>
    </div>
    <!-- App Alert End -->
@endif
