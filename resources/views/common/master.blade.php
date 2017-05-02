<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Investor  | Portal </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link  href="{{URL::asset('/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url::asset('css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{url::asset('')}}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url::asset('/css/skins/_all-skins.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<script src="{{url::to('/js/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url::to('bootstrap/js/bootstrap.min.js')}}"></script>

@stack('styles')


<body class="hold-transition skin-blue sidebar-mini">

    @include('common.topnav')

    <div id="content">@include('common.sidebar') @yield('content')</div>

{{--@yield('login-content')--}}

{{--@include('common.footer')--}}
<!-- AdminLTE App -->
    @stack('scripts')
<script  src="{{url::to('js/app.min.js')}}"></script>

</body>
</html>
