@foreach ($plans as $plan)
<div class="col-md-6 col-lg-4 mb-25">
    <div class="price-card-item h-100 p-30">
        <form class="ajax" action="{{ route('user.subscription.order') }}" method="post" enctype="multipart/form-data" data-handler="setPaymentModal">
            <input type="hidden" name="id" value="{{ $plan->id }}">
            <input type="hidden" class="plan_type" name="duration_type" value="1">
            <h4 class="font-medium">{{ $plan->name }}</h4>
            <p class="font-13 pb-1 pt-1">{{ $plan->description }}</p>
            <hr>
            <h2 class="price-title price-monthly">{{ currencyPrice($plan->monthly_price) }}<span
                    class="font-13 font-medium">/{{
                    __("monthly") }}</span></h2>
            <h2 class="price-title d-none price-yearly">{{ currencyPrice($plan->yearly_price) }}<span
                    class="font-13 font-medium">/{{
                    __("yearly") }}</span></h2>
            <h4 class="font-18 font-medium mt-2">{{ __("What’s included") }}</h4>
            <ul class="pricing-features">
                <li class="d-flex align-items-center mb-3">
                    <span
                        class="price-check-icon d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                        <span class="iconify font-16" data-icon="material-symbols:check-small-rounded"></span>
                    </span>
                    <span class="font-13">{{ __("Generate") }} {{ $plan->generate_characters }} {{ __("Characters")
                        }}</span>
                </li>
                <li class="d-flex align-items-center mb-3">
                    <span
                        class="price-check-icon d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                        <span class="iconify font-16" data-icon="material-symbols:check-small-rounded"></span>
                    </span>
                    <span class="font-13">{{ ("Access") }} {{ getUseCase($plan->access_use_cases) }} {{ ("use cases") }}</span>
                </li>
                
                <li class="d-flex align-items-center mb-3">
                    <span
                        class="price-check-icon d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                        <span class="iconify font-16" data-icon="material-symbols:check-small-rounded"></span>
                    </span>
                    <span class="font-13">{{ __("Write in") }} {{ $plan->write_languages }} {{ __("languages") }}</span>
                </li>
                <li class="d-flex align-items-center mb-3">
                    <span
                        class="price-check-icon d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                        <span class="iconify font-16" data-icon="material-symbols:check-small-rounded"></span>
                    </span>
                    <span class="font-13">{{ __("Access") }} {{ $plan->access_tones }} {{ __("tones") }}</span>
                </li>

                @if($plan->access_community != NULL && $plan->access_community != "")
                <li class="d-flex align-items-center mb-3">
                    <span
                        class="price-check-icon d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                        <span class="iconify font-16" data-icon="material-symbols:check-small-rounded"></span>
                    </span>
                    <span class="font-13">{{ $plan->access_community }}</span>
                </li>
                @endif

                @if($plan->support != NULL && $plan->support != "")
                <li class="d-flex align-items-center mb-3">
                    <span
                        class="price-check-icon d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                        <span class="iconify font-16" data-icon="material-symbols:check-small-rounded"></span>
                    </span>
                    <span class="font-13">{{ $plan->support }}</span>
                </li>
                @endif

            </ul>
            @if($plan->id == $currentPlan?->package_id)
            <button type="button" class="theme-btn-outline current-plan-button mt-15 payment-gateway-active" disabled="disabled" title="Current Plan">
                {{ __("Current Plan") }}
            </button>
            @else
            <button type="submit" class="theme-btn-outline mt-15" title="Subscribe Now">
                {{ __("Subscribe Now") }}
            </button>
            @endif
        </form>
    </div>
</div>
@endforeach
