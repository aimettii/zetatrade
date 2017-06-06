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
        #loader{
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #222428;
            z-index: 999999998;
            top: 0;
            left: 0;
        }

        #loader svg {
            position: absolute;
            left: 50%;
            top: 50%;
            margin-top: -120px;
            margin-left: -120px;
        }
    </style>

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
    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->
<body>

<div id="core">
    <app inline-template>
        <div>
            @include('widgets.loaders.global')
            @include('pages.main')
            @include('pages.auth')
        </div>
    </app>
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
<!-- END OUR SCRIPTS -->
</body>

</html>