{{-- Delete modal --}}

<div class="modal fade" id="modal-delete-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-red">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<ol class="breadcrumb wbackground">
					<li><a class="whitelink" href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
					<li><a class="whitelink" href="{{ route('admin.index') }}"><i class="fa fa-gear fa-spin">	</i> Admin </a></li>
					<li><a class="whitelink" href="{{ route('user.index') }}"><i class="fa fa-user"> </i> User </a></li>
					<li class="active"><a class="whitelink" href="#"><i class="fa fa-trash" aria-hidden="true"> </i>Borrar</a></li>
				</ol>			
			</div>
			<div class="modal-body" class="text-center">

				<h5 class="text-center"> Confirmacion de borrado permanente del usuario</h5>
				<h5 class="text-center"><span id="modalDeleteUserName"></span></h5>


				<form class="text-center" id="userDeleteLink" action="" method="POST" role="form">

					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" id="input_method" class="form-control" value="DELETE">
					<button type="button" class="btn btn-info btn-sm" data-dismiss="modal"> <span class="glyphicon glyphicon-arrow-left"></span> Atras
					</button>
					<button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Borrar </button>
				</form>


			</div>
			<div class="modal-footer bg-red">


			</div>
		</div>
	</div>
</div>




{{-- Create modal --}}

<div class="modal fade" id="modalCreateUser">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-red">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<ol class="breadcrumb wbackground">
					<li><a class="whitelink" href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
					<li><a class="whitelink" href="{{ route('admin.index') }}"><i class="fa fa-gear fa-spin">	</i> Admin </a></li>
					<li><a class="whitelink" href="{{ route('user.index') }}"><i class="fa fa-user"> </i> User </a></li>
					<li class="active"><a class="whitelink" href="#"> <i class="ion ion-android-person-add"></i>Crear user</a></li>
				</ol>
			</div>
			<div class="modal-body" class="text-center">
				<h5 class="text-center"> Confirmacion de borrado permanente del usuario</h5>
				<h5 class="text-center"><span id="modalCreateUserName"></span></h5>
				<form class="text-center" id="userDeleteLink" action="" method="POST" role="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group"><label for="name">Nombre:</label><input name="name" type="text" class="form-control"></div>
					<div class="form-group"><label for="email">Email:</label><input name="email" type="text" class="form-control"></div>
					<div class="form-group">
						<label for="role"> Rol del Usuario: </label>
						<select name="role" id="role" class="form-control">
							@foreach($roles as $role)
							<option @if($role->name == 'Alumno') selected="selected" @endif  value="{{ $role->id }}"> {{ $role->name }}</option>
							@endforeach
						</select>
					</div>
					<button type="button" class="btn btn-info" data-dismiss="modal"> <span class="glyphicon glyphicon-arrow-left"></span> Atras	</button></li>
					<button class=" btn btn-primary"> <i class="ion ion-android-person-add"></i> Crear Usuario </button>
				</form>
			</div>
			<div class="modal-footer bg-red"></div>
		</div>
	</div>
</div>


{{-- Edit modal --}}

<div class="modal fade" id="modalEditUser">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-red">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<ol class="breadcrumb wbackground">
					<li><a class="whitelink" href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
					<li><a class="whitelink" href="{{ route('admin.index') }}"><i class="fa fa-gear fa-spin">	</i> Admin </a></li>
					<li><a class="whitelink" href="{{ route('user.index') }}"><i class="fa fa-user"> </i> User </a></li>
			
					<li class="active"><a class="whitelink" href="#"> <i class="ion ion-android-person-add"></i> Editando user: <span id="modalEditUserNameSpan"></span> </a></li>
				</ol>		
			</div>
			<div class="modal-body" class="text-center">
				<form class="text-center" id="userEditLink" action="" method="POST" role="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" id="input_method" class="form-control" value="PUT">
					<div class="form-group"><label for="name">Nombre:</label><input name="name" id="modalEditUserName" type="text" class="form-control"></div>
					<div class="form-group"><label for="email">Email:</label><input name="email" type="text" id="modalEditUserEmail" class="form-control"></div>
					<div class="form-group">
						<label for="role"> Rol del Usuario: </label>
						<select name="role" id="modalEditUserRole" class="form-control">
							@foreach($roles as $role)
							<option   value="{{ $role->id }}"> {{ $role->name }}</option>
							@endforeach
						</select>
					</div>
					<button type="button" class="btn btn-info" data-dismiss="modal"> <span class="glyphicon glyphicon-arrow-left"></span> Atras</button>
					<button class=" btn btn-primary"> <i class="fa fa-pencil-square-o"></i> Editar Usuario </button>
				</form>
			</div>
			<div class="modal-footer bg-red"></div>
		</div>
	</div>
</div>
