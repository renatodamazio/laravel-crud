@extends('layouts.layout')

@section('content')
<div class="container">
	<div class="column12">
	<input type="hidden" name="upload-route" value="{{route('upload')}}">

		<form id="userform" action="{{route('users.update', $user->id)}}" method="POST" class="card mt-1">
			<div class="card-body">
			 	@csrf
			 	<h1 >Editar dados</h1>
			 	<hr> 
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
                <div class="column12">  
                	<div class="row">                 
						<div class="col-lg-2 text-center">
				 			<figure :style="'background-image: url(' + avatar + ')'">
				 				<input type="file" @change="upload()" name="upload" class="col-lg-4 alpha upload-avatar">
				 			</figure>
				 			
				 			<small>Clique na imagem para alterar sua foto</small>
				 		</div>
				 		<div class="col-lg-10">
				 			<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Nome Completo</label>
										<input class="form-control" required type="text" name="name" value="{{$user->name}}">
									</div>
									<div class="form-group">

										<label>CPF</label>
										<input class="form-control" required type="text" name="cpf" value="{{$user->cpf}}">
									</div>
									<div class="form-group">
										<label>E-mail</label>
										<input class="form-control" required type="text" name="email" value="{{$user->email}}">
									</div>
								</div>
							
								<div class="col-lg-6">
									<div class="form-group">
										<label>Aniversario</label>
										<input class="form-control datepicker" data-date-format="mm/dd/yyyy" type="text" name="birthday" value="{{$user->birthday}}">
									</div>
										<input class="form-control" type="hidden" name="image" value="{{$user->image}}">

									<div class="row">
										<div class="col-lg-6 alpha omega">
											<div class="form-group">
												<label>Senha</label>

												<input 
												class="form-control" 
												type="password" 
												name="password"
												id="password"
												value="" 
												required="" 
												:disabled="!activePassWord">
												
											</div>
										</div>
										<div class="col-lg-6 omega">
											<div class="form-group">
												<label>Confirmar Senha</label>
												<input 
												class="form-control" 
												type="password" 
												name="repassword"
												value="" 
												required="" 
												:disabled="!activePassWord">
												
											</div>
										</div>
										<div class="col-lg-12" v-if="activePassWord">
											<small>A senha deve conter no mínimo 4 caracteres</small>
										</div>
									</div>

									<div class="form-group text-right">
  										<label class="radio-inline">
											<input id="change-pass" type="checkbox" v-model="activePassWord" name=""> 
											<span>Alterar senha</span>
										</label>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<input type="submit" value="SALVAR" class="btn btn-success float-right">
				</div>
			</div>
		</form> 
	</div>
</div>
@endsection