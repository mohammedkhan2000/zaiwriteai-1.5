@extends('admin.layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper bg-white p-30 radius-20">
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between border-bottom mb-20">
                                <div class="page-title-left">
                                    <h3 class="mb-sm-0">{{ $pageTitle }}</h3>
                                </div>
                                <div class="page-title-right">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                                title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
                                        <li class="breadcrumb-item" aria-current="page">{{ __('Users') }}</li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xl-8 col-xxl-6">
                            <div class="subscription-plan-box bg-white theme-border radius-4 p-20 mb-3">


                                <div class="d-flex">
                                    <img class="rounded avatar-md tbl-user-image" src="{{ $user->image }}" alt="">
                                    <div class="ms-3">
                                        {{ $user->name }} <br>
                                        {{ $user->email }} <br>
                                        {{ $user->contact_number }} <br>
                                        @if ($user->status == ACTIVE)
                                            <div class="status-btn status-btn-green font-13 radius-4">
                                                {{ __('Active') }}</div>
                                        @else
                                            <div class="status-btn status-btn-red font-13 radius-4">
                                                {{ __('Deactivate') }}</div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="subscription-plan-box bg-white theme-border radius-4 p-20 mb-3">
                                <div class="current-plan d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p>{{ __('Current Plan') }}</p>
                                        <h4>{{ $userPlan?->name ?? 'No plan' }}</h4>
                                    </div>
                                    <div class="flex-shrink-0 ms-3">
                                        <button type="button" class="theme-btn" id="assignPackage"
                                            title="{{ __('Upgrade Plan') }}">{{ __('Upgrade Plan') }}</button>
                                    </div>
                                </div>
                                @if (!is_null($userPlan))
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
                                @else
                                    <div class="current-plan plan-usage d-flex align-items-center pt-20 mt-20">
                                        <div class="d-flex justify-content-center">
                                            <h4 class="mb-20">{{ __('No plan assigned') }}</h4>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- Subscription Page Plan Box row -->

                        </div>

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
                                                        <td>{{ $invoice->orders_total == 'Admin' ? 'Admin' : currencyPrice($invoice->orders_total) }}
                                                        </td>
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
                                        <h4>{{ __('Orders') }}</h4>
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
                                                                <div class="status-btn status-btn-blue font-13 radius-4">
                                                                    {{ __('Paid') }}</div>
                                                            @elseif ($order->payment_status == ORDER_PAYMENT_STATUS_PENDING)
                                                                <div class="status-btn status-btn-red font-13 radius-4">
                                                                    {{ __('Pending') }}</div>
                                                            @else
                                                                <div class="status-btn status-btn-orange font-13 radius-4">
                                                                    {{ __('Cancelled') }}</div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($order->gatewaySlug == 'bank')
                                                                <a href="{{ getFileUrl($order->folder_name, $order->file_name) }}"
                                                                    class="p-1 tbl-action-btn" title="{{ __('Download') }}"
                                                                    download>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userPackageAssignModal" tabindex="-1" aria-labelledby="userPackageAssignModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userPackageAssignModalLabel">{{ __('Package Assign') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="iconify" data-icon="akar-icons:cross"></span>
                    </button>
                </div>
                <form class="ajax" action="{{ route('admin.packages.assign') }}" method="post"
                    data-handler="getShowMessage">
                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                    <div class="modal-body">
                        <div class="modal-inner-form-box bg-off-white theme-border radius-4 p-20 mb-20 pb-0">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Packages') }}</label>
                                    <select class="form-select flex-shrink-0" name="package_id">
                                        <option value="">{{ __('Select Package') }}</option>
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <button type="button" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</button>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Submit') }}">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('backend/assets/js/custom/user-package-assign.js') }}"></script>
@endpush
