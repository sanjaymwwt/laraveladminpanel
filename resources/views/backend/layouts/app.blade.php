<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('resources/assets/dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('resources/assets/dist/css/skins/_all-skins.min.css') }}">

        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/jvectormap/jquery-jvectormap.css') }}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ asset('resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('resources/assets/dist/css/style.css') }}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <!-- jQuery 3 -->
        <script src="{{ asset('resources/assets/bower_components/jquery/dist/jquery.min.js') }}" ></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('resources/assets/bower_components/jquery-ui/jquery-ui.min.js') }}" ></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
$.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('resources/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}" ></script>

        <!-- Sparkline -->
        <script src="{{ asset('resources/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}" ></script>
        <!-- jvectormap -->
        <script src="{{ asset('resources/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" ></script>
        <script src="{{ asset('resources/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" ></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('resources/assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}" ></script>
        <!-- daterangepicker -->
        <script src="{{ asset('resources/assets/bower_components/moment/min/moment.min.js') }}" ></script>
        <script src="{{ asset('resources/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}" ></script>
        <!-- datepicker -->
        <script src="{{ asset('resources/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" ></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" ></script>
        <!-- Slimscroll -->
        <script src="{{ asset('resources/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}" ></script>
        <!-- ChartJS -->
        <script src="{{ asset('resources/assets/bower_components/chart.js/Chart.js') }}" ></script>

        <!-- FastClick -->
        <script src="{{ asset('resources/assets/bower_components/fastclick/lib/fastclick.js') }}" ></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('resources/assets/dist/js/adminlte.min.js') }}" ></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('resources/assets/dist/js/demo.js') }}" ></script>
        <script src="{{ asset('resources/assets/plugins/notify/notify.min.js') }}" ></script>
        <script src="{{ asset('resources/assets/dist/js/custom.js') }}" ></script>
        <script type="text/javascript">
                editor_filebrowserUploadUrl = "{{ asset('admin/ckeditor/image_upload') }}";
        </script>

        <!-- Scripts -->
<!--        <script src="{{ asset('js/app.js') }}" defer></script>
         Fonts 
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
         Styles 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">        
        <div class="wrapper">
            
            @include('backend.layouts.header')
            @include('backend.layouts.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @include('flash-message')                
                @yield('content')
            </div>
            @include('backend.layouts.footer')
        </div>
        <!-- /.content-wrapper -->
        <script type="text/javascript">
            $(".flash-msg").fadeTo(2000, 500).slideUp(500, function () {
                $(".flash-msg").slideUp(500);
            });           
        </script>
    </body>
</html>
