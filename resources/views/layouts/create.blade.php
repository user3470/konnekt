<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> {{ $page ?? "Welcome"}} | {{env('APP_NAME')}}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{env('APP_URL')}}">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/material-bootstrap-wizard.css')}}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/material-kit.min.css')}}" rel="stylesheet" />

    @livewireStyles
</head>

<body>
    <div class="image-container set-full-height" style="background-image: url('{{asset('img/wizard-book.jpg')}}')">
        <!--   Creative Tim Branding   -->
        <a href="{{env('APP_URL')}}">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{asset('img/logo.png')}}">
                </div>
                <div class="brand">
                    {{env('APP_NAME')}}
                </div>
            </div>
        </a>

        <!--  Made With Material Kit  -->
        <a href="http://demos.creative-tim.com/material-kit/index.html?ref=material-bootstrap-wizard"
            class="made-with-mk">
            <div class="brand">MK</div>
            <div class="made-with">Made with <strong>Material Kit</strong></div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    @yield('content')
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center">
                Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>.
                Free download <a href="http://www.creative-tim.com/product/material-bootstrap-wizard">here.</a>
            </div>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.bootstrap.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!--  Plugin for the Wizard -->
<script src="{{asset('js/material-bootstrap-wizard.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>

<script src="{{asset('js/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
@livewireScripts

<script>
    $(document).ready(function() {
      if ($('.datetimepicker').length != 0) {
          const end = moment().subtract(18, 'years');
        $('.datetimepicker').datetimepicker({
            viewMode: 'years',
            format: 'DD/MM/YYYY',
            maxDate: end,
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
      }
    });
</script>

</html>