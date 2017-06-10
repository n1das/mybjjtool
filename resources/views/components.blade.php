<section class="content">

	<div class="box box-primary">
		<div class="box-header nopadbot">
			<h3 class="box-title" style="margin-left: 5px"> <i class="ion ion-android-person"></i> Gestor de {{$compname}}</h3>
			<a href="{{ route($slot . '.create') }}" class="btn btn-primary btn-sm pull-right"> <i class="ion ion-android-person-add"></i> Crear nuevo usuario</a>	
		</div>

		<div class="box-body">


			<table id="example" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Cinturón</th>
						<th>Roles</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($$slot as $case)
					<tr>
						<td> {{ $case->name }}</td>
				
						<td>
							<button onclick="deleteEntry('{{$$slot->id}}' ,'{{$$slot->name}}')" class="btn btn-danger btn-xs"> Borrar</button>
							<button onclick="editEntry()" class="btn btn-warning btn-xs"> Editar</button>
						</td>
					</tr>					
					@endforeach
				</tbody>
			</table>

		</div>

	</div>



	<!-- /.box -->
</div>
</section>


<!--



$slot = nombre del modelo (coincide con la ruta y la variable que pasamos)
$compname = Nombre en castellano en singular