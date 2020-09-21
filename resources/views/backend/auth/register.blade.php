<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('resources/assets/dist/css/AdminLTE.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('resources/assets/plugins/iCheck/square/blue.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



        <!-- Scripts -->
<!--        <script src="{{ asset('js/app.js') }}" defer></script>
         Fonts 
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
         Styles 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    </head>
    <body class="hold-transition register-page">
        <style>
            .error{
                color:red;
            }
        </style>
        <div class="register-box">
            <div class="register-logo">
                <b>WAdmin</b>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>            
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group has-feedback">
                        {!! Form::text('username', null, ['class' => 'form-control', 'size' => 64,'placeholder' => 'Username' ]) !!}
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="error"><?php echo $errors->first('username'); ?></span>
                    </div>
                    <div class="form-group has-feedback">
                        {!! Form::text('firstname', null, ['class' => 'form-control', 'size' => 64,'placeholder' => "First Name"  ]) !!}                        
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="error"><?php echo $errors->first('firstname'); ?></span>
                    </div>
                    <div class="form-group has-feedback">                        
                        {!! Form::text('lastname', null, ['class' => 'form-control', 'size' => 64,'placeholder' => "Last Name"  ]) !!}
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="error"><?php echo $errors->first('lastname'); ?></span>
                    </div>
                    <div class="form-group has-feedback">                        
                        {!! Form::text('email', null, ['class' => 'form-control', 'size' => 64,'placeholder' => "Email"  ]) !!}
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span class="error"><?php echo $errors->first('email'); ?></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <span class="error"><?php echo $errors->first('password'); ?></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>                

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    {{  html()->a('#','<i class="fa fa-facebook"></i> Sign in using Facebook')->class('btn btn-block btn-social btn-facebook btn-flat') }}
                    {{  html()->a('#','<i class="fa fa-google-plus"></i> Sign in using Google+')->class('btn btn-block btn-social btn-google btn-flat') }}
                </div>
                <!-- /.social-auth-links -->

                <a href="{{ route('login')}}" class="text-center">I already have a membership</a>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="{{ asset('resources/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('resources/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <!-- iCheck -->
        <script src="{{ asset('resources/assets/plugins/iCheck/icheck.min.js') }}"></script>
        <script>
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
    });
});
        </script>
    </body>
</html>
