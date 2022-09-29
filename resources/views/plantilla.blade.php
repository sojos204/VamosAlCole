<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="gb18030">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>¡Vamos al Cole!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ url('/') }}/img/favicon.ico">
	
	<!--=====================================
	PLUGINS DE CSS
	======================================-->

	{{-- BOOTSTRAP 4 --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/bootstrap/bootstrap5.min.css">
	
	{{-- OverlayScrollbars.min.css --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/OverlayScrollbars.min.css">

	{{-- TAGS INPUT --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/tagsinput.css">

	{{-- SUMMERNOTE --}}
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

	{{-- NOTIE --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/notie.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/dataTables.bootstrap4.min.css">	
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/responsive.bootstrap.min.css">

	{{-- CSS AdminLTE --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/adminlte.min.css">

	{{-- google fonts --}}
	<link href="{{ url('/') }}/css/plugins/fonts/css.css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">

	{{-- bootstrap-datepicker --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/bootstrap-datepicker.min.css">

	{{-- CSS OMPM para editar --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/custom.css">
	<link rel="stylesheet" href="{{ url('/') }}/css/movil.css">

	{{-- Bootstrap-Style-Vertical-Accordion-Menu --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/leftnavi.css">

	<!--=====================================
	PLUGINS DE JS
	======================================-->

	{{-- Fontawesome --}}
	<script src="{{ url('/') }}/js/plugins/fontawesome/e632f1f723.js" crossorigin="anonymous"></script>

	<!-- jQuery library 3.6.0 pero la 3.5.1 es la estable-->
	<script src="{{ url('/') }}/js/plugins/jquery/jquery-3.5.1.min.js"></script>

	<!-- Popper JS 1.14.7-->
	 <script src="{{ url('/') }}/js/plugins/jquery/popper.min.js"></script>

	<!-- Latest compiled Bootstrap v5.0.1 -->
	<script src="{{ url('/') }}/js/plugins/bootstrap/bootstrap.min.js"></script>

	{{-- jquery.overlayScrollbars.min.js --}}
	<script src="{{ url('/') }}/js/plugins/jquery.overlayScrollbars.min.js"></script>

	{{-- TAGS INPUT --}}
	{{-- https://www.jqueryscript.net/form/Bootstrap-4-Tag-Input-Plugin-jQuery.html --}}
	<script src="{{ url('/') }}/js/plugins/tagsinput.js"></script>

	{{-- SUMMERNOTE --}}
	{{-- https://summernote.org/ --}}
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

	{{-- NOTIE --}}
	{{-- https://github.com/jaredreich/notie --}}
	<script src="{{ url('/') }}/js/plugins/notie.js"></script>

	{{-- SWEET ALERT --}}
	{{-- https://sweetalert2.github.io/ --}}
	<script src="{{ url('/') }}/js/plugins/sweetalert.js"></script>

	<script src="{{ url('/') }}/js/custom.js"></script>

	<!-- DataTables 
	https://datatables.net/-->
	<script src="{{ url('/') }}/js/plugins/jquery.dataTables.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/dataTables.bootstrap4.min.js"></script> 
	<script src="{{ url('/') }}/js/plugins/dataTables.responsive.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/responsive.bootstrap.min.js"></script>	

	{{-- JS AdminLTE --}}
	<script src="{{ url('/') }}/js/plugins/adminlte.js"></script>

	{{-- bootstrap-datepicker --}}
	<script src="{{ url('/') }}/js/plugins/bootstrap-datepicker.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/bootstrap-datepicker.es.min.js"></script>

	{{-- Bootstrap-Style-Vertical-Accordion-Menu --}}
	<script src="{{ url('/') }}/js/plugins/leftnavi.js"></script>

	{{-- Ajax Autocomplete Search --}}
	<script src="{{ url('/') }}/js/plugins/autocomplete/bootstrap3-typeahead.min.js"></script> 

</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">

	<div class="wrapper">

		@include('modulos.header')

		@include('modulos.sidebar')

		@yield('content')

		@include('modulos.footer')
	</div>

<input type="hidden" id="ruta" value="{{url('/')}}">
<script src="{{url('/')}}/js/home.js"></script>
</body>

</html>