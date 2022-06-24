<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Dashboard</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('admin/assets/img/favicon.png')}}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/feathericon.min.css')}}">

		<link rel="stylesheet" href="{{asset('admin/assets/plugins/morris/morris.css')}}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

		<!--[if lt IE 9]>
			<script src="{{asset('admin/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('admin/assets/js/respond.min.js')}}"></script>
		<![endif]-->
		{{-- ckeditor link  --}}
		<script src="{{asset('admin/assets/ckeditor/ckeditor.js')}}"></script>

		{{-- select2 library link  --}}
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<link href="path/to/select2.min.css" rel="stylesheet" />
		
		
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

            @include('admin.layouts.header')
			@if (Auth::guard('admin')->check())
			@include('admin.layouts.sidebar')
			@endif
            



			<!-- Page Wrapper -->
            <div class="page-wrapper">

                <div class="content container-fluid">



                    @section('main-content')

                    @show


				</div>
			</div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

		<!-- Slimscroll JS -->
        <script src="{{asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

		<script src="{{asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/morris/morris.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/chart.morris.js')}}"></script>

		<!-- Custom JS -->
		<script  src="{{asset('admin/assets/js/script.j')}}s"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="path/to/select2.min.js"></script>
		
		<script>
			CKEDITOR.replace( 'content');
			$(document).ready(function() {
    			$('#tags').select2();
			});
			
		</script>
		

    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>
