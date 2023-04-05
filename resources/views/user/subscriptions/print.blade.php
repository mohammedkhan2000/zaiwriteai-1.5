<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ __('Invoice') }}</title>
    @include('user.layouts.style')
</head>

<body>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="invoice-preview-wrap" id="printDiv1">
                        <div class="invoice-heading-part">
                            <div class="invoice-heading-left">
                                <img src="{{ getSettingImage('app_logo_black') }}" alt="">
                                <h4>{{ $invoice->transaction_id }}</h4>
                            </div>
                        </div>
                        <div class="invoice-address-part">
                            <div class="invoice-address-part-left">
                                <h4 class="invoice-generate-title">{{ __('Invoice To') }}</h4>
                                <div class="invoice-address">
                                    <h5>{{ $invoice->first_name }} {{ $invoice->last_name }}</h5>
                                    <small>{{ $invoice->email }}</small>
                                    <h6>{{ __("Package") }} : {{ $invoice->packageName }}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-table-part">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="invoice-heading-color">{{ __('Package') }}</th>
                                            {{-- <th class="invoice-heading-color">{{ __('Description') }}</th> --}}
                                            <th class="invoice-heading-color">{{ __('Date') }}</th>
                                            <th class="invoice-tbl-last-field invoice-heading-color">
                                                {{ __('Amount') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($items as $item) --}}
                                            <tr>
                                                <td>{{ $invoice->packageName }}</td>
                                                {{-- <td>{{ $invoice->description }}</td> --}}
                                                <td>{{ \Carbon\Carbon::parse($invoice->order_date)->format('Y-m-d') }}</td>
                                                <td class="invoice-tbl-last-field">{{ currencyPrice($invoice->total) }}
                                                </td>
                                            </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="transaction-table-part">
                            <h4 class="invoice-generate-title invoice-heading-color">{{ __('Transaction Details') }}
                            </h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="invoice-heading-color">{{ __('Date') }}</th>
                                            <th class="invoice-heading-color">{{ __('Gateway') }}</th>
                                            <th class="invoice-heading-color">{{ __('Transaction ID') }}</th>
                                            <th class="invoice-tbl-last-field invoice-heading-color text-end">{{ __('Amount') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($invoice->order_date)->format('Y-m-d') }}</td>
                                            <td>{{ $invoice->gatewayName }}</td>
                                            <td>{{ $invoice->transaction_id }}</td>
                                            <td class="invoice-tbl-last-field text-end">{{ '('.$invoice->gateway_currency.') '.$invoice->transaction_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.layouts.script')
    <script>
        function printDiv() {
            $(".print-button").hide();

            var DocumentContainer = document.getElementById('printDiv1');
            var WindowObject = window.open('', "_blank",
                "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
            WindowObject.document.writeln(DocumentContainer.innerHTML);
            WindowObject.document.close();
            WindowObject.focus();
            WindowObject.print();
            WindowObject.close();
        }

        window.print()
    </script>
</body>

</html>
