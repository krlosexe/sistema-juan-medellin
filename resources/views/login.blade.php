@extends('layouts.app')


	@section('content')

		<div class="app">
			<div class="authentication">
				<div class="sign-in">
					<div class="row no-mrg-horizon">
						<div class="col-md-8 no-pdd-horizon d-none d-md-block">
							<div class="full-height bg" style="background-image: url('images/others/img-29.jpg')">
								<div class="img-caption">
									<h1 class="caption-title">We make spectacular</h1>
									<p class="caption-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 no-pdd-horizon">
							<div class="full-height bg-white height-100">
								<div class="vertical-align full-height pdd-horizon-70">
									<div class="table-cell">
										<div class="pdd-horizon-15">
											<h2>Login</h2>
											<p class="mrg-btm-15 font-size-13">Please enter your user name and password to login</p>
											<form class="user" id="login" method="post" action="">
												@csrf
												<div class="form-group">
													<input type="email" name="email" class="form-control" placeholder="User name">
												</div>
												<div class="form-group">
													<input type="password" name="password" class="form-control" placeholder="Password">
												</div>
												<div class="checkbox font-size-12">
													<input id="agreement" name="agreement" type="checkbox">
													<label for="agreement">Mantener Sesion</label>
												</div>
												<input type="hidden" id="ruta" value="<?= url('/') ?>">
												<button type="submit" class="btn btn-info">Login</button>
											</form>
										</div>
									</div>
								</div>
								<div class="login-footer">
									<img class="img-responsive inline-block" src="assets/images/logo/logo.png" width="100" alt="">
									<span class="font-size-13 pull-right pdd-top-10">Don't have an account? <a href="">Sign Up Now</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection





	@section('CustomJs')


		<script>
			$(document).ready(function(){
				validAuth(true);
				login();
			});

			function login(){
				enviarFormulario("#login", 'auth', '#cuadro2', true);
			}


		</script>


	@endsection


