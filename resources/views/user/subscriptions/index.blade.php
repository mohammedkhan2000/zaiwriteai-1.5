@extends('user.layouts.app')

@section('content')
    <!-- Right Content Start -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Content Wrapper Start -->
                <div class="page-content-wrapper bg-light p-30 radius-10">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <div class="page-title-left">
                                    <h2 class="mb-sm-0">{{ __('My Subscriptions') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Subscription Page Plan Box row -->
                    <div class="row">
                        <div class="col-md-12 col-xl-8 col-xxl-6">
                            @if (!is_null($userPlan))
                                <div class="subscription-plan-box bg-white theme-border radius-4 p-20 mb-3">
                                    <div class="current-plan d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p>{{ __('Current Plan') }}</p>
                                            <h4>{{ $userPlan->name }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 ms-3">
                                            <button type="button" class="theme-btn" id="chooseAPlan"
                                                title="{{ __('Upgrade Plan') }}">{{ __('Upgrade Plan') }}</button>
                                        </div>
                                    </div>
                                    <div class="current-plan plan-usage d-flex align-items-center pt-20 mt-20">
                                        <div class="flex-grow-1">
                                            <p>{{ __('Usage') }}</p>
                                            <div class="plan-usage-list">
                                                <div class="d-flex">
                                                    <span class="plan-usage-list-dot flex-shrink-0 radius-50 me-2"></span>
                                                    <h4 class="flex-grow-1">{{ getCharUsed() }} /
                                                        {{ $userPlan->generate_characters }} {{ 'characters' }}</h4>
                                                </div>

                                                <div class="d-flex">
                                                    <span class="plan-usage-list-dot flex-shrink-0 radius-50 me-2"></span>
                                                    <h4 class="flex-grow-1">{{ getUseCase($userPlan->access_use_cases) }}
                                                        {{ 'use cases' }}</h4>
                                                </div>

                                                <div class="d-flex">
                                                    <span class="plan-usage-list-dot flex-shrink-0 radius-50 me-2"></span>
                                                    <h4 class="flex-grow-1">{{ __('All') }}
                                                        {{ __('languages') }}</h4>
                                                </div>

                                                <div class="d-flex">
                                                    <span class="plan-usage-list-dot flex-shrink-0 radius-50 me-2"></span>
                                                    <h4 class="flex-grow-1">{{ __('All') }}
                                                        {{ 'tones' }}</h4>
                                                </div>

                                                @if ($userPlan->access_community)
                                                    <div class="d-flex">
                                                        <span
                                                            class="plan-usage-list-dot flex-shrink-0 radius-50 me-2"></span>
                                                        <h4 class="flex-grow-1">{{ $userPlan->access_community }}</h4>
                                                    </div>
                                                @endif

                                                @if ($userPlan->support)
                                                    <div class="d-flex">
                                                        <span
                                                            class="plan-usage-list-dot flex-shrink-0 radius-50 me-2"></span>
                                                        <h4 class="flex-grow-1">{{ $userPlan->support }}</h4>
                                                    </div>
                                                @endif

                                                <div class="d-flex">
                                                    <span class="plan-usage-list-dot flex-shrink-0 radius-50 me-2"></span>
                                                    <h4 class="flex-grow-1">{{ __('Plan started at ') }}
                                                        {{ $userPlan->start_date }}</h4>
                                                </div>
                                                <div class="d-flex">
                                                    <span class="plan-usage-list-dot flex-shrink-0 radius-50 me-2"></span>
                                                    <h4 class="flex-grow-1">{{ __('Plan end in ') }}
                                                        {{ $userPlan->end_date }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Subscription Page Plan Box row -->
                            @else
                                <div class="row">
                                    <div class="col-md-12 col-xl-8 col-xxl-6">
                                        <h4 class="mb-20">{{ "Currencly you doesn't have any plan" }}</h4>
                                    </div>

                                </div>
                            @endif

                            @if (!is_null($userPlan))
                                <div class="cancel-subscription mt-25 pt-2">
                                    <div>
                                        <form action="{{ route('user.subscription.cancel') }}" method="post">
                                            @csrf
                                            <button type="button" class="theme-btn-red subscriptionCancel"
                                                title="Cancel your subscription">{{ __('Cancel your subscription') }}</button>
                                        </form>
                                    </div>
                                    <p class="mt-3">
                                        {{ __('Please be aware that cancelling your subscription will cause you to lose all your saved content and earned words on your subscription.') }}
                                    </p>
                                </div>
                            @endif

                        </div>

                        @if (!is_null($userPlan))
                            <div class="col-md-12 col-xl-8 col-xxl-6">
                                <div class="subscription-plan-box bg-white theme-border radius-4 p-20 mb-3">
                                    <div class="current-plan d-flex align-items-center pb-20">
                                        <div class="flex-grow-1">
                                            <h4>{{ __('Billing Information & Invoices') }}</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="allDataTable" class="table theme-border dt-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('SL') }}</th>
                                                        <th>{{ __('Package') }}</th>
                                                        <th>{{ __('Amount') }}</th>
                                                        <th>{{ __('Start Date') }}</th>
                                                        <th>{{ __('End Date') }}</th>
                                                        <th>{{ __('Download') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($invoices as $invoice)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $invoice->packageName }}</td>
                                                            <td>{{ currencyPrice($invoice->total) }}</td>
                                                            <td>{{ timeFormat($invoice->start_date) }}</td>
                                                            <td>{{ timeFormat($invoice->end_date) }}</td>
                                                            <td>
                                                                <a href="{{ route('user.subscription.invoice.print', $invoice->id) }}"
                                                                    target="_blank" class="p-1 tbl-action-btn"
                                                                    title="download"><span class="iconify"
                                                                        data-icon="fa6-solid:download"></span></a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                {{ __('No Invoice Found') }}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="subscription-plan-box bg-white theme-border radius-4 p-20 mb-3">
                                    <div class="current-plan d-flex align-items-center pb-20">
                                        <div class="flex-grow-1">
                                            <h4>{{ __('My Orders') }}</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="allDataTable" class="table theme-border dt-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('SL') }}</th>
                                                        <th>{{ __('Package') }}</th>
                                                        <th>{{ __('Amount') }}</th>
                                                        <th>{{ __('Gateway') }}</th>
                                                        <th>{{ __('Status') }}</th>
                                                        <th>{{ __('Download') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($orders as $order)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $order->packageName }}</td>
                                                            <td>{{ currencyPrice($order->total) }}</td>
                                                            <td>{{ $order->gatewayTitle }}</td>
                                                            <td>
                                                                @if ($order->payment_status == ORDER_PAYMENT_STATUS_PAID)
                                                                    <div
                                                                        class="status-btn status-btn-blue font-13 radius-4">
                                                                        {{ __('Paid') }}</div>
                                                                @elseif ($order->payment_status == ORDER_PAYMENT_STATUS_PENDING)
                                                                    <div class="status-btn status-btn-red font-13 radius-4">
                                                                        {{ __('Pending') }}</div>
                                                                @else
                                                                    <div
                                                                        class="status-btn status-btn-orange font-13 radius-4">
                                                                        {{ __('Cancelled') }}</div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($order->gatewaySlug == 'bank')
                                                                    <a href="{{ getFileUrl($order->folder_name, $order->file_name) }}"
                                                                        class="p-1 tbl-action-btn"
                                                                        title="{{ __('Download') }}" download>
                                                                        <span class="iconify"
                                                                            data-icon="fa6-solid:download"></span></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                {{ __('No Invoice Found') }}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    <!-- Page Content Wrapper End -->

                </div>

            </div>
            <!-- End Page-content -->

        </div>
    </div>
    <!-- Right Content End -->
@endsection

@push('script')
    <script src="{{ asset('user/assets/js/custom/package.js') }}"></script>
@endpush
