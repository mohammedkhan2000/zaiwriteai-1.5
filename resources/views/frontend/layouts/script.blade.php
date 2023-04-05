<!--=======================================
    All Jquery Script link
    ===========================================-->
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/jquery/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- ==== Plugin JavaScript ==== -->
<script src="{{ asset('frontend/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>

<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>

<!--Wow Script-->
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>

<!--Iconify Icon-->
<script src="{{ asset('frontend/assets/js/iconify.min.js') }}"></script>

<!-- Menu js -->
<script src="{{ asset('frontend/assets/js/menu.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
@stack('script')
<script>
    "use strict";
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
