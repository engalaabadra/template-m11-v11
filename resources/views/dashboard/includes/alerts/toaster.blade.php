@push('js')
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-{{app()->getLocale() == 'ar' ? 'left' : 'right'}}",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "3000",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "swing",
            "showMethod": "slideDown",
            "hideMethod": "slideUp"
        };

        toastr.{{$alert_status}}("{{$message}}");
    </script>
@endpush


