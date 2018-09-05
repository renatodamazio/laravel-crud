@extends('layouts.layout')

@section('content')
<div class="container">
	<div class="column12">
		<form id="userform" action="{{route('users.save')}}" method="POST" class="card">
			<div class="card-body">
			 	@csrf
			 	<h1>Novo usuário</h1>
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

				 			<!-- <button type="button" @click="upload()">Upoload</button> -->
				 			
				 			<small>Clique na imagem para alterar sua foto</small>
				 		</div>
				 		<div class="col-lg-10">
				 			<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Nome Completo</label>
										<input class="form-control" required type="text" name="name" value="">
									</div>
									<div class="form-group">

										<label>CPF</label>
										<input class="form-control" required type="text" name="cpf" value="">
									</div>
									<div class="form-group">
										<label>E-mail</label>
										<input class="form-control" required type="text" name="email" value="">
									</div>
								</div>
							
								<div class="col-lg-6">
									<div class="form-group">
										<label>Data de nascimento</label>
										<input class="form-control datepicker" data-date-format="dd/mm/yyyy" type="text" name="birthday" value="">
									</div>
										<input class="form-control" type="hidden" name="image" value="">

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
												>
												
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
												>
												
											</div>
										</div>
										<div class="col-lg-12">
											<small>A senha deve conter no mínimo 5 caracteres</small>
										</div>
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
