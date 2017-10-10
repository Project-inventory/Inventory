<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        
        @yield('meta')

        <!-- Styles -->
        <!-- Bootstrap CSS -->
        {!!Html::style('vendors/css/bootstrap.min.css')!!}
        <!-- font icon -->
        {!!Html::style('vendors/css/font-awesome.min.css')!!}
        {!!Html::style('vendors/css/elegant-icons-style.css')!!}
        <!-- full calendar css-->
        {!!Html::style('vendors/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')!!}
        {!!Html::style('vendors/assets/fullcalendar/fullcalendar/fullcalendar.css')!!}
        <!-- easy pie chart-->
        {!!Html::style('vendors/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')!!}
        @yield('style')
        {{--@yield('before-styles')--}}

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(getRtlCss(mix('css/backend.css'))) }}
        @else
            {{ Html::style(mix('css/backend.css')) }}
        @endif

        @yield('after-styles')

        <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
        {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
        <![endif]-->

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body class="skin-{{ config('backend.theme') }} {{ config('backend.layout') }}">
        @include('includes.partials.logged-in-as')

        <div class="wrapper">
            @include('backend.includes.header')
            @include('backend.includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')

                    {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
                    {!! Breadcrumbs::renderIfExists() !!}
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="loader" style="display: none;">
                        <div class="ajax-spinner ajax-skeleton"></div>
                    </div><!--loader-->

                    @include('includes.partials.messages')
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('backend.includes.footer')
        </div><!-- ./wrapper -->

        <!-- JavaScripts -->
        @yield('before-scripts')
        <!-- javascripts -->
        {!!Html::script('vendors/js/jquery.js')!!}
        {!!Html::script('vendors/js/jquery-ui-1.10.4.min.js')!!}
        {!!Html::script('vendors/js/jquery-1.8.3.min.js')!!}
        {!!Html::script('vendors/js/jquery-ui-1.9.2.custom.min.js')!!}
        <!-- bootstrap -->
        {!!Html::script('vendors/js/bootstrap.min.js')!!}
        <!-- nice scroll -->
        {!!Html::script('vendors/js/jquery.scrollTo.min.js')!!}
        {!!Html::script('vendors/js/jquery.nicescroll.js')!!}
        <!-- charts scripts -->
        {!!Html::script('vendors/assets/jquery-knob/js/jquery.knob.js')!!}
        {!!Html::script('vendors/js/jquery.sparkline.js')!!}
        {!!Html::script('vendors/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')!!}
        {!!Html::script('vendors/js/owl.carousel.js')!!}
        <!-- jQuery full calendar -->
        {!!Html::script('vendors/js/fullcalendar.min.js')!!}<!-- Full Google Calendar - Calendar -->
        {!!Html::script('vendors/assets/fullcalendar/fullcalendar/fullcalendar.js')!!}
        <!--script for this page only-->
        {!!Html::script('vendors/js/calendar-custom.js')!!}
        {!!Html::script('vendors/js/jquery.rateit.min.js')!!}
        <!-- custom select -->
        {!!Html::script('vendors/js/jquery.customSelect.min.js')!!}
        {!!Html::script('vendors/assets/chart-master/Chart.js')!!}
        <!--custome script for all page-->
        {!!Html::script('vendors/js/scripts.js')!!}
        <!-- custom script for this page-->
        {!!Html::script('vendors/js/sparkline-chart.js')!!}
        {!!Html::script('vendors/js/easy-pie-chart.js')!!}
        {!!Html::script('vendors/js/jquery-jvectormap-1.2.2.min.js')!!}
        {!!Html::script('vendors/js/jquery-jvectormap-world-mill-en.js')!!}
        {!!Html::script('vendors/js/xcharts.min.js')!!}
        {!!Html::script('vendors/js/jquery.autosize.min.js')!!}
        {!!Html::script('vendors/js/jquery.placeholder.min.js')!!}
        {!!Html::script('vendors/js/gdp-data.js')!!}
        {!!Html::script('vendors/js/morris.min.js')!!}
        {!!Html::script('vendors/js/sparklines.js')!!}
        {!!Html::script('vendors/js/charts.js')!!}
        {!!Html::script('vendors/js/jquery.slimscroll.min.js')!!}
        {{ Html::script(mix('js/backend.js')) }}
        @yield('after-scripts')
    </body>
</html>