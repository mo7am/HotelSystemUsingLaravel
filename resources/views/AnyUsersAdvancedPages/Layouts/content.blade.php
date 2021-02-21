<!DOCTYPE html>
<html >
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@if(LaravelLocalization::setLocale() == 'ar')
        {{ config('app.name_ar') }}
        @elseif(LaravelLocalization::setLocale() == 'en')
        {{ config('app.name_en') }}
        @endif| @if(auth()->user()->type_id == 1 )

            {{__('pageContent.navbar_manager')}}
        @elseif(auth()->user()->type_id == 2)
            {{__('pageContent.navbar_receptionist')}}
        @elseif(auth()->user()->type_id == 3)
            {{__('pageContent.navbar_acountant')}}
        @elseif(auth()->user()->type_id == 4)
            {{__('pageContent.navbar_housekeeping')}}
        @elseif(auth()->user()->type_id == 5)
            {{__('pageContent.navbar_chief')}}
        @elseif(auth()->user()->type_id == 6)
            {{__('pageContent.navbar_localguest')}}
        @elseif(auth()->user()->type_id == 7)
            {{__('pageContent.navbar_foreignguist')}}
        @endif </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/bower_components/Ionicons/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Theme style -->



    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/bower_components/select2/dist/css/select2.min.css')}}">


    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/jquery.gritter.css')}}">


    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/animate.css')}}">

    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/aos.css')}}">

    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designAnyUserAdvancedPages/style.css')}}">



    <link rel="stylesheet" type="text/css" href="{{URL::asset('designHomePageHotel/css/demo.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('designHomePageHotel/css/style3.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('designHomePageHotel/css/animate-custom.css')}}" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<body onload="onload();"  dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}" class="hold-transition skin-blue sidebar-mini">

<section id="loading">
    <div id="loading-content"></div>
</section>

<div class="wrapper" id= 'commentarea'>

    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('indexAnyUserAdvanced')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>{{__('pageContent.HotelO')}}</b>{{__('pageContent.HotelEL')}}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b> {{__('pageContent.Hotel')}}
                </b></span>
        </a>
        @include('anyUsersAdvancedPages.layouts.navbar')

    </header>
    @include('anyUsersAdvancedPages.layouts.aside')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

        @yield('contentAnyUsersAdvancedPages')

    </div>
   @include('anyUsersAdvancedPages.layouts.footer')
   @include('anyUsersAdvancedPages.layouts.asideControl')


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@yield('scripts')
<!-- jQuery 3 -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{URL::asset('designAnyUserAdvancedPages/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL::asset('designAnyUserAdvancedPages/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{URL::asset('designAnyUserAdvancedPages/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('designAnyUserAdvancedPages/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{URL::asset('designAnyUserAdvancedPages/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('designAnyUserAdvancedPages/dist/js/demo.js')}}"></script>
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('designAnyUserAdvancedPages/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{URL::asset('designAnyUserAdvancedPages/jquery.dcjqaccordion.2.7.js')}}"></script>




<script src="{{URL::asset('designHomePageHotel/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{URL::asset('designHomePageHotel/js/jquery.waypoints.min.js')}}"></script>
<script src="{{URL::asset('designHomePageHotel/js/jquery.stellar.min.js')}}"></script>

<script src="{{URL::asset('designHomePageHotel/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('designHomePageHotel/js/aos.js')}}"></script>

<script src="{{URL::asset('designHomePageHotel/js/scrollax.min.js')}}"></script>
<script src="{{URL::asset('designAnyUserAdvancedPages/main.js')}}"></script>


<script src="{{URL::asset('jquery-3.0.0.min.js')}}"></script>
<script>

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })



    function onload(){
        var localValue = document.getElementById("getLocalValue").value;

        if(localValue == 'ar'){
            $('head').append('<link rel="stylesheet" type="text/css" href="{{URL::asset('designAnyUserAdvancedPages/dist/css/AdminLTE-rtl.min.css')}}">');
        }else if(localValue == '')
        {
            $('head').append('<link rel="stylesheet" type="text/css" href="{{URL::asset('designAnyUserAdvancedPages/dist/css/AdminLTE.min.css')}}">');
        }
        else{
            $('head').append('<link rel="stylesheet" type="text/css" href="{{URL::asset('designAnyUserAdvancedPages/dist/css/AdminLTE.min.css')}}">');
        }
    }

</script>
</body>
</html>
