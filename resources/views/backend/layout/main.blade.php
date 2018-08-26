<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name') }} </title>
    <!--
                    To change Tab Icon Change the Path Down there  ;) 
    -->
    <link rel="icon" href="{{asset('backend/images/download.jpg')}}">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css' )}}"
          rel="stylesheet">
    <!-- Chart.js -->
    <link href="{{ asset('assets/vendors/Chart.js/dist/Chart.min.js')}}">
    <link href="{{ asset('assets/vendors/jqvmap/dist/jqvmap.min.css' )}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/vendors/bootstrap-daterangepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
          rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/build/css/custom.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('assets/build/css/bootstrap-datepicker.css')  }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/css_parsley/parsley.css')  }}" rel="stylesheet">
    {{--View Page css--}}
    <link href="{{ asset('assets/vendors/view_page/view.css')  }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bz0twtnc8o3mf6xjcuvciua4eqg2segyhcibhjdk0c2yqq33"></script>
    <link href="{{ asset('assets/build/nepali_datepicker/nepali.datepicker.v2.2.min.css')  }}" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- top navigation -->
        <div class="top_nav">
            @include('backend.layout.head')
        </div>
        <div class="col-md-3 left_col">
            @include('backend.layout.sideNav')
        </div>
        <div class="right_col" role="main" style="min-height: 1000px;">
            <div class="row tile_count" style="margin-bottom: 0px;">
                <div class="clearfix"></div>
                <div class="panel-body">
                    <div class="x_panel">
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    @yield('content')
                                </div>
                            </div>
                        </section>
                    </div>
                </div>  <!--Panel Body -->
            </div>
        </div>
        <footer>
            <div class="pull-left">
                Copyright 2018 &copy
            </div>
            <div class="pull-right">
                Powered By: <a href="http://www.impactit.org" target="_blank"> IMPACT IT</a>
            </div>
            <div class="clearfix"></div>
        </footer>
    </div>
</div>

<!-- jQuery -->
{{--<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js')}}"></script>--}}
{{--<script src="{{ asset('assets/build/js/custom.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Parsley Form Validation -->
<script src="{{ asset('assets/vendors/js_parsley/parsley.min.js')}}"></script>
<script src="{{ asset('assets/vendors/blockUI/blockUI.js')}}"></script>

<script type="text/javascript" src="{{ asset('assets/build/nepali_datepicker/nepali.datepicker.v2.2.min.js')}}"></script>

<script type="text/javascript">
    $('#form').parsley();
</script>
{{--<!-- FastClick -->--}}
<script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ asset('assets/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{ asset('assets/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{ asset('assets/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{ asset('assets/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{ asset('assets/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{ asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{ asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{ asset('assets/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{ asset('assets/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{ asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{ asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('/assets/vendors/bootstrap-daterangepicker/bootstrap-datetimepicker.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('assets/build/js/custom.min.js')}}"></script>
<script src="{{ asset('assets/build/js/bootstrap-datepicker.js')}}"></script>
<!-- validator -->
<script src="{{ asset('assets/vendors/validator/validator.js')}}"></script>
<!-- Datatables -->
<script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js' )}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js' )}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{ asset('assets/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{ asset('assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
{{-- Vehicle Station Show/Hide --}}
<script>
    function showMe(e) {
        var strdisplay = e.options[e.selectedIndex].value;
        var e = document.getElementById("idShowMe");
        if (strdisplay == "Hide") {
            e.style.display = "none";
        } else {
            e.style.display = "block";
        }
    }
</script>

{{-- Password Show/Hide --}}
<script type="text/javascript">
    $(document).ready(function () {
        $('.showPassword').on('change', function () {
            var isChecked = $(this).prop('checked');
            if (isChecked) {
                $('.my-password').attr('type', 'text');
            } else {
                $('.my-password').attr('type', 'Password');
            }
        });
    });
</script>

{{-- Nepali Date picker Dropdown --}}
{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--$('#session').nepaliDatePicker({--}}
{{--ndpEnglishInput: 'englishDate',--}}
{{--// npdMonth: true,--}}
{{--npdYear: true,--}}
{{--npdYearCount: 10 // Options | Number of years to show--}}
{{--});--}}
{{--});--}}
{{--</script>--}}

{{-- Date Time picker Dropdown --}}
<script type="text/javascript">
    $(function () {
        $('.datetimepicker1').datetimepicker({
            viewMode: 'years',
            format: 'YYYY/MM/DD'
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $('.datetimepicker3').datetimepicker({
//            format: 'LT',
            format: 'HH:mm'
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('.datetimepicker2').datetimepicker({
            viewMode: 'years',
            format: 'YYYY'
        });
    });
</script>

{{-- Flash Message Display ko lagi--}}
<script>
    $('div.alert').delay(5000).slideUp(200);
</script>

{{--Delete all selected Values --}}
<script>
    $(function () {
        $("#selectall").click(function () {
            if ($("#selectall").is(':checked')) {
                $("input[type=checkbox]").each(function () {
                    $(this).attr("checked", true);
                });
                $("#bulk-delete").show();

            } else {
                $("input[type=checkbox]").each(function () {
                    $(this).attr("checked", false);
                });
                $("#bulk-delete").hide();
            }
        });
    });
</script>
<script>
    function checkbox_is_checked() {

        if ($(".check-all:checked").length > 0) {
            $("#bulk-delete").show();
        }
        else {
            $("#bulk-delete").hide();
        }
    }
</script>

</body>
</html>
