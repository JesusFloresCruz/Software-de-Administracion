<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Control de gestion de proyectos - GESTOR</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        @yield('css')
	</head>
	<body>
<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Control de gestion de proyectos - GESTOR</a>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <!-- Left column -->
            <a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Herramientas</strong></a>

            <hr>

            <ul class="nav nav-stacked">
                <li class="active"> <a href="/"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
                <li><a href="/proyecto"><i class="glyphicon glyphicon-blackboard"></i> Proyectos </a></li>
                <li><a href="/usuario"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
                <li><a href="/asignacion"><i class="glyphicon glyphicon-tasks"></i> Asignaciones</a></li>
            </ul>
            <hr>
        </div>
        <!-- /col-3 -->
        <div class="col-sm-9">
            @yield('content')
        </div>
        <!--/col-span-9-->
    </div>
</div>
<!-- /Main -->

<footer class="text-center">Control de gestion - <a href="#"><strong>Gestor</strong></a></footer>


	<!-- script references -->
		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
		<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('js/scripts.js') }}"></script>
        @yield('js')
	</body>
</html>