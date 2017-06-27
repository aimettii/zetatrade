<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body{
            overflow: hidden;
        }
        .pace {
            display: none;
        }

        #core{
            height: 100%;
        }

        body.pace-done #page-loader{
            display: none;
        }

        #page-loader{
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #222428;
            z-index: 999999998;
            top: 0;
            left: 0;
        }

        #page-loader svg {
            position: absolute;
            left: 50%;
            top: 50%;
            margin-top: -120px;
            margin-left: -120px;
        }
    </style>

    <script data-pace-options='{ "ajax": false }' src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>

    <!-- BEGIN LAYOUT FIRST STYLES -->
    <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
    <!-- END LAYOUT FIRST STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ assets_diff('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_diff('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_diff('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_diff('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ assets_diff('assets/global/css/components-rounded.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ assets_diff('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ assets_diff('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_diff('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_diff('assets/pages/css/login-5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_diff('assets/layouts/layout3/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_diff('assets/layouts/layout3/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ assets_diff('assets/layouts/layout3/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_diff('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ assets_diff('assets/global/plugins/ladda/ladda-themeless.min.css') }}" rel="stylesheet" type="text/css">
    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->
<body>

<div id="page-loader">
    <svg version="1.1" id="dc-spinner" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="240" height="240" viewBox="0 0 38 38" preserveAspectRatio="xMinYMin meet"><text x="14" y="21" font-family="Monaco" font-size="2px" fill="grey" style="letter-spacing: 0.6px;">LOADING
            <animate attributeName="opacity" values="0;1;0" dur="1.8s" repeatCount="indefinite"></animate></text> <path fill="#373a42" d="M20,35c-8.271,0-15-6.729-15-15S11.729,5,20,5s15,6.729,15,15S28.271,35,20,35z M20,5.203
    C11.841,5.203,5.203,11.841,5.203,20c0,8.159,6.638,14.797,14.797,14.797S34.797,28.159,34.797,20
    C34.797,11.841,28.159,5.203,20,5.203z"></path> <path fill="#373a42" d="M20,33.125c-7.237,0-13.125-5.888-13.125-13.125S12.763,6.875,20,6.875S33.125,12.763,33.125,20
    S27.237,33.125,20,33.125z M20,7.078C12.875,7.078,7.078,12.875,7.078,20c0,7.125,5.797,12.922,12.922,12.922
    S32.922,27.125,32.922,20C32.922,12.875,27.125,7.078,20,7.078z"></path> <path fill="#2AA198" stroke="#2AA198" stroke-width="0.6027" stroke-miterlimit="10" d="M5.203,20
			c0-8.159,6.638-14.797,14.797-14.797V5C11.729,5,5,11.729,5,20s6.729,15,15,15v-0.203C11.841,34.797,5.203,28.159,5.203,20z" transform="rotate(359.949 20.0096 20.0096)"><animateTransform attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" calcMode="spline" keySplines="0.4, 0, 0.2, 1" keyTimes="0;1" dur="2s" repeatCount="indefinite"></animateTransform></path> <path fill="#859900" stroke="#859900" stroke-width="0.2027" stroke-miterlimit="10" d="M7.078,20
  c0-7.125,5.797-12.922,12.922-12.922V6.875C12.763,6.875,6.875,12.763,6.875,20S12.763,33.125,20,33.125v-0.203
  C12.875,32.922,7.078,27.125,7.078,20z" transform="rotate(313.333 20 20)"><animateTransform attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="1.8s" repeatCount="indefinite"></animateTransform></path></svg>
</div>

<div id="core">
    <app></app>
</div>

<script src="{{ assets_diff('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ assets_diff('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ assets_diff('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/layouts/layout3/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/layouts/layout3/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/pages/scripts/ui-toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/ladda/spin.min.js') }}" type="text/javascript"></script>
<script src="{{ assets_diff('assets/global/plugins/ladda/ladda.min.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- BEGIN OUR SCRIPTS -->
<script src="//{{ Request::getHost() }}:4444/socket.io/socket.io.js"></script>
<script src="js/app.js" type="text/javascript"></script>
<script>
    window.Echo = new Echo({
        broadcaster: 'socket.io',
        host: '{{ Request::getHost() }}:4444'
    });

    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right",
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    Vue.mixin({

        data () {
            return {
                csrfToken: '{{ csrf_token() }}',
                csrfField: '{{ csrf_field() }}',
                config: {
                    app: {
                        name: '{{ config('app.name') }}'
                    }
                }
            }
        },

        methods: {

            assetsDiff: {!! assets_diff_js() !!},

            showToast: data => toastr[data.type](data.text, data.title),

            hasPrivilege (p) {
                if(typeof this.userData.privileges[p] !== 'undefined' && this.userData.privileges[p] !== null)
                    return this.userData.privileges[p];
                else
                    return false;
            }

        }

    });

    window.Core = new Vue({
        el: '#core',
        data: {
            orders: {!! json_encode($orders) !!},
            borders: {!! json_encode($borders) !!},
            booking_driver_languages: {!! json_encode($booking_driver_languages) !!}
        }
    });
</script>
<!-- END OUR SCRIPTS -->
</body>

</html>