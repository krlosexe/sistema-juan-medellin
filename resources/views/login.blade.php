@extends('layouts.app')


	@section('content')

		<div class="container">
		    <!-- Outer Row -->
		    <div class="row justify-content-center">

		      <div class="col-xl-5 col-lg-12 col-md-9">

		        <div class="card o-hidden border-0 shadow-lg my-5">
		          <div class="card-body p-0">
		            <!-- Nested Row within Card Body -->
		            <div class="row">
		             
		              <div class="col-lg-12">
		                <div class="p-5">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
		                  </div>
		                  <form class="user" id="login" method="post" action="">
		                  	<div id="alertas"></div>
		                  	@csrf
		                    <div class="form-group">
		                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
		                    </div>
		                    <div class="form-group">
		                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" required>
		                    </div>
		                    <div class="form-group">
		                      <div class="custom-control custom-checkbox small">
		                        <input type="checkbox" class="custom-control-input" id="customCheck">
		                        <label class="custom-control-label" for="customCheck">Remember Me</label>
		                      </div>
		                    </div>
		                    <input type="hidden" id="ruta" value="<?= url('/') ?>">

		                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
		                    <hr>

		                   <!--  <a href="index.html" class="btn btn-google btn-user btn-block">
		                      <i class="fab fa-google fa-fw"></i> Login with Google
		                    </a>
		                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
		                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
		                    </a> -->
		                  </form>
		                  <hr>
		                 <!--  <div class="text-center">
		                    <a class="small" href="forgot-password.html">Forgot Password?</a>
		                  </div>
		                  <div class="text-center">
		                    <a class="small" href="register.html">Create an Account!</a>
		                  </div> -->
		                </div>
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


