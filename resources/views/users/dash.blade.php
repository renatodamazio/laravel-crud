@extends('layouts.layout')

@section('content')


<div class="container">
	<div class="card">
		<div class="card-body">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-2">
					<figure style="background-image: url('http://127.0.0.1:3000{{$userImage}}')">
	 				</figure>
	 			</div>
	 			<div class="col-lg-8">
					<h1>Seja bem vindo {{$userName}}</h1>
					<ul>
						<li>Email: {{$userEmail}}</li>
						<li>Data de nascimento: {{$userBirthday}}</li>
					</ul>
					
					<a href="/users/edit/{{$id}}" class="btn btn btn-primary">Editar perfil</a>

				</div>
			</div>
		</div>
	</div>
  </div>

  <div class="card mt-4">
  	<div class="card-body">
  		<div class="col-lg-12 mb-2">
				<div class="row">
					<h3 class="col-lg-8">Ultimos usuários cadastrados</h3>
					<div class="col-lg-4 text-right">	
						<a href="/users/create" class="btn btn-primary">Criar novo usuário</a>
						<a href="/users/" class="btn btn-secondary">Listar todos</a>
					</div>
				</div>
			</div>
			<table  class="table table-striped table-bordered col-lg-12">
			<thead class="thead-dark">
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>CPF</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->cpf}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
  	</div>
  </div>

</div>

@endsection	