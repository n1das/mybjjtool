@extends('layouts.app')

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">

<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script>
	$.extend( $.fn.dataTable.defaults, {
		responsive: true
	} );

	$(document).ready(function() {
		$('#example').DataTable({
			"pageLength": 15,
			lengthChange: false,
			processing: true,
			responsive: true,
			serverSide: true,
			ajax: '{{route('user.serverSide')}}',
			language: {
				"lengthMenu": "Display _MENU_ records per page",
				"zeroRecords": "No existe ninguna entrada que cumpla con los filtros deseados",
				"info": "",
				"infoEmpty": "Sin entradas",
				"infoFiltered": "( Mostrando _END_  entradas filtradas de un total de _MAX_)",
				"search": "Buscar :"
			},
			columnDefs: [
			{ className: "dt-center", "targets": '_all'  }
			],
			columns: [
			{data: 'name'},
			{data: 'roles', name: 'roles.display_name'},
			{data: 'created_at', "searchable": false},
			{data: 'action', "searchable": false},
			],
			
		});
	} );

</script>

<script>
	function getInfo(user) {

		$.ajax({
    		type: 'GET', // Type of response and matches what we said in the route
   	 		url: '/admin/user/' + user, // This is the url we gave in the route
   	 	}).done(function(msg){
   	 		var obj = JSON.parse(msg);
   	 		return obj;
   	 	}); 

   	 }

   	</script>


   	<script>

   		function createEntry() {

   			$('#modalCreateUser').modal('show');

			// hacemos el modal grande
		}

		function deleteEntry(id, name) {

			var id = id;
			var name = name;
			var link = '/admin/user/' + id;
			$('#modal-delete-user').modal('show');
			$('#modalDeleteUserName').text(name);
			$('#userDeleteLink').attr('action', link);
		}


		function editEntry(user) {

			var obj;

			$.ajax({
    		type: 'GET', // Type of response and matches what we said in the route
   	 		url: '/admin/user/' + user, // This is the url we gave in the route
   	 	}).done(function(msg){
   	 		var obj = JSON.parse(msg);
   	 		var link = '/admin/user/' + obj.id;
   	 		$('#userEditLink').attr('action', link);
   	 		$('#modalEditUser').modal('show');
   	 		$('#modalEditUserName').val(obj.name);
   	 		$('#modalEditUserEmail').val(obj.email);
   	 		$('#modalEditUserRole').val(obj.roles[0].name);
   	 		$('#modalEditUserRole option:contains("'+ obj.roles[0].name +'")').prop('selected', true)
   	 		$('#modalEditUserNameSpan').text(obj.name);
   	 	}); 
   	 }



   	</script>

   	@endsection

   	@section('content')


   	<!-- Main content -->
   	<section class="content">
   		<div class="row">
   			<div class="col-xs-12">
   				<ol class="breadcrumb mybread  bg-primary">
   					<li><a class="whitelink" href="/"><i class="fa fa-home"></i> Home</a></li>
   					<li><a class="whitelink" href="{{route('admin.index')}}"><i class="fa fa-gear fa-spin">	</i> Admin</a></li>
   					<li class=""> <a class="whitelink" href="	"><i class="fa fa-user"></i> Users </a></li>
   				</ol>
   			</div>
   			<div class="col-xs-12">
   				<div class="box box-danger">
   					<div class="box-header nopadbot">
   						<h3 class="box-title" style="margin-left: 5px"> <i style="color:#9a0007" class="ion ion-android-person-add"></i>	 Gestor de Usuarios</h3>
   						<a href="#" onclick="createEntry()" class="btn btn-primary btn-sm pull-right"> <i class="ion ion-android-person-add"></i> Crear nuevo usuario</a>	
   					</div>

   					<div class="box-body">


   						<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
   							<thead>
   								<tr>
   									<th>Nombre</th>
   									<th>Cinturón</th>
   									<th>Roles</th>
   									<th>Acciones</th>
   								</tr>
   							</thead>

   						</table>

   					</div>

   				</div>



   				<!-- /.box -->
   			</div>
   		</div></div>
   	</section>
   	@include('admin.user._modals.delete')

   	@endsection

