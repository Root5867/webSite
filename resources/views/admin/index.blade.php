<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="{{url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('public/admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('public/admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!-- {{-- admin css --}} -->
    <link rel="stylesheet" href="{{ url('public/admin/css/admin.css') }}">

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{url('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
    <script src="{{url('public/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ 'public/admin/js/sweetalert2.all.min.js' }}"></script>
    <!-- ckeditor & ckfinder -->
    <script src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('public/admin/ckeditor/ckfinder/ckfinder.js')}}"></script>
    <!-- ckeditor & ckfinder -->
    <link rel="icon" href="{{ url( 'public/admin/images/CTTech3.png') }} ">

    <link rel="stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css ">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js "></script>
    <meta property="og:title " content="WebSite Ban hang " />
    <meta property="og:type " content="congthanh - Design " />
    <meta property="og:image " content="{{ url( 'public/admin/images/CTTech3.png') }} " />
    <meta property="fb:app_id " content="1430065787143715 " />
    <meta property="fb:admins " content="100040971591106 " />
    <script>
        window.addEventListener("load ", function(event) {
            lazyload();
        });
    </script>
</head>

<body>
    <div id="wrapper ">
        {{-- @include('') --}} @include("admin.header ")
        <div class="rev-slider ">
            @yield('content')
        </div>
        @include('admin.footer')
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{url( 'public/admin/bower_components/jquery/dist/jquery.min.js')}} "></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{url( 'public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}} "></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url( 'public/admin/bower_components/metisMenu/dist/metisMenu.min.js')}} "></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url( 'public/admin/dist/js/sb-admin-2.js')}} "></script>

    <!-- DataTables JavaScript -->
    <script src="{{url( 'public/admin/bower_components/datatables/media/js/jquery.dataTables.min.js')}} "></script>
    <script src="{{url( 'public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}} "></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js "></script>
</body>

</html>