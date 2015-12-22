<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Manager</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!! asset('assets/admin/bower_components/metisMenu/dist/metisMenu.min.css') !!}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{!! asset('assets/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') !!}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{!! asset('assets/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('assets/admin/dist/css/sb-admin-2.css" rel="stylesheet') !!}">

    <!-- Custom Fonts -->
    <link href="{!! asset('assets/admin/bower_components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- Jquery UI -->
    <link href="{!! asset('assets/admin/dist/css/jquery-ui.css') !!}" rel="stylesheet" type="text/css">
	
	@yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.includes.navigation')

        <div id="page-wrapper">
        @yield('content')
        <!-- /#page-wrapper -->
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{!! asset('assets/admin/bower_components/jquery/dist/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/js/jquery-ui.js') !!}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{!! asset('assets/admin/bower_components/metisMenu/dist/metisMenu.min.js') !!}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('assets/admin/dist/js/sb-admin-2.js') !!}"></script>
    
    <!-- DataTables JavaScript -->
    <script src="{!! asset('assets/admin/bower_components/datatables/media/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}"></script>
    
    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });

    // popover demo
    $("[data-toggle=popover]").popover();

    $('.confirm_delete').click(function(event) {
        event.preventDefault();
        var r=confirm("Are you sure you want to delete?");
        if (r==true)   {  
           window.location = $(this).attr('href');
        }

    });
    
    </script>

    @yield('scripts')

</body>

</html>
