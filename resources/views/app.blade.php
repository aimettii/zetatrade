
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script data-pace-options='{ "ajax": false }' src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <style>
        @keyframes loader {
            0%, 10%, 100% {
                width: 80px;
                height: 80px;
            }
            65% {
                width: 150px;
                height: 150px;
            }
        }
        @keyframes loaderBlock {
            0%, 30% {
                transform: rotate(0);
            }
            55% {
                background-color: #F37272;
            }
            100% {
                transform: rotate(90deg);

            }
        }
        @keyframes loaderBlockInverse {
            0%, 20% {
                transform: rotate(0);
            }
            55% {
                background-color: #F37272;
            }
            100% {
                transform: rotate(-90deg);
            }
        }
        .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 80px;
            height: 80px;
            transform: translate(-50%, -50%) rotate(45deg) translate3d(0, 0, 0);
            animation: loader 1.2s infinite ease-in-out;
            z-index: 999999999;
        }

        .loader span {
            position: absolute;
            display: block;
            width: 40px;
            height: 40px;
            background-color: #EE4040;
            animation: loaderBlock 1.2s infinite ease-in-out both;
            z-index: 999999999;
        }

        .loader span:nth-child(1) {
             top: 0;
             left: 0;
         }
        .loader span:nth-child(2) {
             top: 0;
             right: 0;
             animation: loaderBlockInverse 1.2s infinite ease-in-out both;
         }
        .loader span:nth-child(3) {
             bottom: 0;
             left: 0;
             animation: loaderBlockInverse 1.2s infinite ease-in-out both;
         }
        .loader span:nth-child(4) {
             bottom: 0;
             right: 0;
         }
        #loader{
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 999999998;
            top: 0;
            left: 0;
        }
    </style>
    <script>
        function assetsDiff(asset){
            @if(!config("app.assets_diff"))
                return asset;
            @else
                return '{{ assets_diff('') }}' + asset
            @endif
        }

        Pace.on('start', function(){
            if(typeof Core != 'undefined'){
                Core.loader = true;
            }
        });
        Pace.on('done', function(){
            setTimeout(function(){
                Core.loader = false;
                Core.init = false;
            }, 2000)
        });
    </script>
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
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->
<body>

<div id="core">
    @include('widgets.loader')

    @include('pages.auth')

    @include('pages.main')
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
<!-- END THEME LAYOUT SCRIPTS -->
<!-- BEGIN OUR SCRIPTS -->
<script src="//{{ Request::getHost() }}:4444/socket.io/socket.io.js"></script>
<script src="js/app.js" type="text/javascript"></script>
<script src="js/core.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script src="js/auth.js" type="text/javascript"></script>
<!-- END OUR SCRIPTS -->
</body>

</html>