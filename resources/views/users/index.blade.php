@extends('layouts.layout')

@section('content')

<div class="container">
	<form action="{{route('users.find')}}" method="GET"  class="card">
	<div class="card-body">
		<div class="row">
			<h3 class="col-lg-9">Lista de usuários</h3>
			<div class="col-lg-3 float-right">
				<a href="/users/create" class="btn btn-primary float-right">Novo usuário</a>
			</div>
		</div>
		<hr>
		<div class="column-sm-6 float-right">
			<input type="search" name="q" value="{{isset($q) ? $q : ''}}" placeholder="Pesquisar">
		</div>
	</div>
	</form>
	<div class="card mt-3">
		<div class="card-body">
			<table  class="table table-striped table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>CPF</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->cpf}}</td>
						<td>
						<div class="row m-0">
							<a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Editar</a>
							&nbsp;&nbsp;
							<form action="{{route('users.delete', $user->id)}}" method="POST">
							 	@csrf
								<button type="submit" class="btn btn-danger">Deletar</button>
							</form>
						</div>
						</td>
					</tr>
					@endforeach
				</tbody>

			</table>
			@if(isset($pagination))
				@if($pagination)
					<div>
						{{ $users->links() }}
					</div>
				@endif
			@endif
		</div>
	</div>
</div>
@endsection
