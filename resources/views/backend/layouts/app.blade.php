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
        @yield('style')
        {{--@yield('before-styles')--}}

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(getRtlCss(mix('css/backend.css'))) }}
        @else
            {{ Html::style(mix('css/backend.css')) }}
        @endif
            {!!Html::style('css/datatable.css') !!}
            {!!Html::style('node_modules/select2/dist/css/select2.min.css') !!}
            {!!Html::style('node_modules/sweetalert2/dist/sweetalert2.min.css') !!}

        @yield('after-styles')
        {!!Html::style('node_modules/highcharts/css/highcharts.css') !!}


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
                    {{--{!! Breadcrumbs::renderIfExists() !!}--}}
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
        <!-- DataTables -->
        {{ Html::script(mix('js/backend.js')) }}
        {{ Html::script("js/datatable.js") }}
        {{ Html::script("js/datatable.bootstrap.js") }}
        {{ Html::script("js/bootstrap-confirmation.js") }}

        {!!Html::script('node_modules/select2/dist/js/select2.min.js') !!}
        {!!Html::script('node_modules/sweetalert2/dist/sweetalert2.min.js') !!}

        {!!Html::script('node_modules/highcharts/js/highcharts.js') !!}

        @yield('after-scripts')



    </body>

</html>