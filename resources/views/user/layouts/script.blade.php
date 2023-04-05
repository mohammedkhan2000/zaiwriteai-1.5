<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('user/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- JQuery UI -->
<script src="{{ asset('user/assets/libs/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('user/assets/libs/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('user/assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>

<!--Iconify Icon-->
<script src="{{ asset('user/assets/js/iconify.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('user/assets/libs/simplebar/simplebar.min.js') }}"></script>

<script src="{{ asset('user/assets/js/dark-mode.js') }}"></script>
<script src="{{ asset('user/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('user/assets/js/custom.js') }}"></script>

<script src="{{ asset('assets/sweetalert2/sweetalert2.all.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/common.js') }}"></script>


<script>
    "use strict";
    var currencySymbol = "{{ getCurrencySymbol() }}";
    var currencyPlacement = "{{ getCurrencyPlacement() }}";

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    @if (Session::has('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if (Session::has('error'))
        toastr.error("{{ session('error') }}");
    @endif
    @if (Session::has('info'))
        toastr.info("{{ session('info') }}");
    @endif
    @if (Session::has('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if (@$errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
