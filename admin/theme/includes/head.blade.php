<!--begin::Base Path (base relative path for assets of this page) -->
<base href="../">
<!--end::Base Path -->

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Updates and statistics">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="_token" content="{{ csrf_token() }}">
<title>@if( View::hasSection('title')) @yield('title') | @endif {{ setting('site-name') }}</title>

<link rel="shortcut icon" href="{{ asset('sitebucket/other/favicon.png') }}" type="image/png"/>
<link rel="apple-touch-icon" href="{{ asset('sitebucket/other/favicon.png') }}" type="image/png"/>

<!--begin::Fonts -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
WebFont.load({
    google: {
        "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
    },
    active: function () {
        sessionStorage.fonts = true;
    }
});
</script>
<!--end::Fonts -->

<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('/theme/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->

<!--begin:: Global Mandatory Vendors -->
<link href="{{ asset('/theme/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="{{ asset('/theme/vendors/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->
<link href="{{ asset('/theme/css/demo1/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles -->

<!--begin::Layout Skins(used by all pages) -->
<link href="{{ asset('/theme/css/demo1/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/css/demo1/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/css/demo1/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/css/demo1/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<!--end::Layout Skins -->

<link rel="shortcut icon" href="{{ asset('sitebucket/other/event_logo.png') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
