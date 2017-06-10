@extends('layouts.app')

@section('content')

<section class="content-header">
	<h1>
		:: Gestor de Usuarios ::
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href=""{{ route('admin.index') }}"">Admin </a> </li>
		<li class="active"> Users Index </li>

	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>44</h3>

					<p>Alumnos Activos</p>
				</div>
				<div class="icon">
					<i class="ion ion-person"></i>
				</div>
				<a href="{{ route('user.index') }}" class="small-box-footer">
					Gestionar Users <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>900</h3>

					<p>Horas Logeadas Última semana</p>
				</div>
				<div class="icon">
					<i class="ion  ion-android-alarm-clock"></i>
				</div>
				<a href="#" class="small-box-footer">
					Gestionar Users<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h3>5</h3>

					<p>Técnicas añadidas</p>
				</div>
				<div class="icon">
					<i class="ion ion-easel"></i>
				</div>
				<a href="#" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>44</h3>

					<p>Mensajes nuevos última semana</p>
				</div>
				<div class="icon">
					<i class="ion"></i>
				</div>
				<a href="#" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<!-- /.box-footer-->
	</div>
	<!-- /.box -->
</div>
</section>


@endsection


