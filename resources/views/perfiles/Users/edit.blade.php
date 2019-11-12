<div class="card shadow mb-4 hidden" id="cuadro4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Editar usuario</h6>
	</div>
	<div class="card-body">
	  	<form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
			
			@csrf

			<input type="hidden" name="_method" value="put">
	  		 <ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li  class="nav-item">
			    <a id="tab1-0" class="nav-link active" id="home-tab" data-toggle="tab" href="#home-edit" role="tab" aria-controls="home" aria-selected="true">Cuenta de Usuario</a>
			  </li>
			  <li  class="nav-item">
			    <a id="tab2-1" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-edit" role="tab" aria-controls="profile" aria-selected="false">Datos Personales</a>
			  </li>
			</ul>

			<br><br>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active tab_content1-0" id="home-edit" role="tabpanel" aria-labelledby="home-tab">
				
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-sm-12 text-center">
					            <div class="kv-avatar">
					                <div class="file-loading">
					                    <input id="avatar-edit" name="img-profile" type="file">
					                </div>
					            </div>
					            <div class="kv-avatar-hintss">
					                <small>Seleccione una foto</small>
					            </div>
					        </div>
						</div>
					</div>


					<div class="col-md-6">
			            <div class="form-group valid-required">
                          <label for=""><b>Email</b></label>
			              <input type="email" name="email" class="form-control form-control-user" id="email-edit" placeholder="Email" required>
			            </div>


                        <div class="form-group row">
			              <div class="col-sm-6 mb-3 mb-sm-0 valid-required">
						  	<label for=""><b>Contraseña</b></label>
			                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Contraseña">
			              </div>
			              <div class="col-sm-6 valid-required">
						  	<label for=""><b>Repita Contraseña</b></label>
			                <input type="password" name="repeat-password" class="form-control form-control-user" id="RepeatPassword" placeholder="Repita Contraseña">
			              </div>
			            </div>
			            
			              <div class="col-sm-6 mb-3 mb-sm-0 valid-required">
                            <label for=""><b>Rol</b></label>
			                <select class="form-control" name="rol" id="rol-edit" required>
			                	<option value="">Seleccione un Rol</option>
			                	<option value="1">op1</option>
			                </select>
			              </div>
			        </div>
					
				</div>

			  </div>



			  <div class="tab-pane fade tab_content2-1" id="profile-edit" role="tabpanel" aria-labelledby="profile-tab">

			  		<div class="row">
			  			<div class="col-sm-4 valid-required">
			  				<label for=""><b>Nombres</b></label>
				            <input type="text" name="nombres" class="form-control form-control-user" id="nombres-edit" placeholder="Nombres" required>
				        </div>

				        <div class="col-sm-4 valid-required">
				        	<label for=""><b>Apellido Paterno</b></label>
				            <input type="text" name="apellido_p" class="form-control form-control-user" id="apellidos_p-edit" placeholder="Apellido Paterno" required>
				        </div>

				        <div class="col-sm-4 valid-required">
				        	<label for=""><b>Apellido Materno</b></label>
				            <input type="text" name="apellido_m" class="form-control form-control-user" id="apellidos_m-edit" placeholder="Apellido Materno" required>
				        </div>
			  		</div>


			  		<br>


			  		<div class="row">

				        <div class="col-sm-4 valid-required">
                            <label for=""><b>Numero de Cedula</b></label>
				            <input type="text" name="n_cedula" class="form-control form-control-user" id="n_cedula-edit" placeholder="Numero de Cedula" required>
				        </div>

				        <div class="col-sm-4 valid-required">
				        	<label for=""><b>Fecha de Nacimiento</b></label>
				            <input type="date" name="fecha_nacimiento" class="form-control form-control-user" id="fecha_nacimiento-edit" required>
				        </div>

			  			<div class="col-sm-4 valid-required">
                          <label for=""><b>Numero de Telefono</b></label>
				            <input type="text" name="telefono" class="form-control form-control-user" id="telefono-edit" placeholder="Numero de Telefono" required>
				        </div>

			  		</div>

                      <br>



			  		<div class="row">
			  			<div class="col-sm-12 valid-required">
                            <label for=""><b>Direccion</b></label>
				            <textarea name="direccion" placeholder="Direccion" id="direccion-edit" class="form-control" cols="30" rows="10"></textarea>
				        </div>
			  		</div>
					

					<input type="hidden" name="id_user" class="id_user">
					<input type="hidden" name="token" class="token">

                    <input type="hidden" name="id_user_edit" id="id_edit">
			  		<br>

			  		<br>
			  </div>
			  

            <center>
            	<button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro4')">
              		Cancelar
            	</button>
            	<button id="send_usuario_edit" class="btn btn-primary btn-user">
              		Guardar
            	</button>
            </center>
          
        </form>

    </div>
</div>