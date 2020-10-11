<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{env('APP_URL')}}">

    <link href="{{asset('dist/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content=" ">
    <meta name="author" content="anonymous">
    <title> {{ $page ?? "Welcome"}} | {{env('APP_NAME')}}</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{('dist/css/app.css')}}" />
    <!-- END: CSS Assets-->
    @livewireStyles
</head>
<!-- END: Head -->

<body class="app">
    <div class="content">
        @yield('content')
    </div>
    <script src="{{asset('dist/js/app.js')}}"></script>
    <!-- END: JS Assets-->
    @livewireScripts
</body>

</html>