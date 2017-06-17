@extends('layouts.gest_quiniela')


@section('content')
	@include('alerts.success')
	<table class="table">
		<thead>
			<th>id_user</th>
			<th>Id_quiniela</th>
			<th>Username</th>
			<th>Correo</th>
			
		</thead>
		
		@foreach($users as $user)
			<?php $correo = DB::table('users')->where('username','=',$user->username)->get()?>
			@if($id_quiniela == $user->id_quiniela && $user->status == 'Inscrito')				
				<tbody>
				
				<td>{{$user->id}}</td>
				<td>{{$user->id_quiniela}}</td>
				<td>{{$user->username}}</td>
				<td>{{$correo[0]->email}}</td>
				</tbody>
			@endif
		
		@endforeach


		
	</table>
	
	<div align = "center">
		<form name="form"  action="{{action('UserquinielaController@generarPDF')}}" method="GET" >
							<input name="id_quiniela" type="hidden" id="id_quiniela" size="30" maxlength="10" value=<?php echo $id_quiniela ?>  />
								
							<button class="btn btn-danger">Generar PDF</button>
		</form>
		
		<br>
		
		<form name="form"  action="{{action('UserquinielaController@enviarPDF')}}" method="GET" >
							<input name="id_q" type="hidden" id="id_q" size="30" maxlength="10" value=<?php echo $id_quiniela ?>  />
								
							<button class="btn btn-danger">Enviar PDF</button>
		</form>		
		
	</div>

	{!! $users->render() !!}
		
@stop