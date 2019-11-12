<div class="card shadow mb-4 hidden" id="cuadro3">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Consultar usuario</h6>
	</div>
	<div class="card-body">
	  
			
			@csrf
	  		<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li  class="nav-item">
			    <a id="tab0-0" class="nav-link active" id="home-tab" data-toggle="tab" href="#home-view" role="tab" aria-controls="home" aria-selected="true">Cuenta de Usuario</a>
			  </li>
			  <li  class="nav-item">
			    <a id="tab1-1" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-view" role="tab" aria-controls="profile" aria-selected="false">Datos Personales</a>
			  </li>
			</ul>

			<br><br>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active tab_content0-0" id="home-view" role="tabpanel" aria-labelledby="home-tab">
				
				<div class="row">
					
					<div class="col-md-6">
						<div class="row">
							<div class="col-sm-12 text-center">
					            <div class="kv-avatar">
					                <div class="file-loading">
					                    <input id="avatar-view" name="img-profile" type="file" required>
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
			              <input type="email" name="email" class="form-control form-control-user" id="email-view" placeholder="Email" required>
			            </div>

			            <div class="form-group row">
			              <div class="col-sm-6 mb-3 mb-sm-0 valid-required">

			                <select class="form-control" name="rol" id="rol-view" required>
			                	<option value="">Seleccione un Rol</option>
			                	<option value="1">op1</option>
			                </select>
			              </div>
			            </div>


	            
				  	</div>
				</div>



			  </div>



			  <div class="tab-pane fade tab_content1-1" id="profile-view" role="tabpanel" aria-labelledby="profile-tab">

			  		<div class="row">
			  			<div class="col-sm-4 text-center valid-required">
			  				<label for=""><br></label>
				            <input type="text" name="nombres" class="form-control form-control-user" id="nombres-view" placeholder="Nombres" required>
				        </div>

				        <div class="col-sm-4 text-center valid-required">
				        	<label for=""><br></label>
				            <input type="text" name="apellido_p" class="form-control form-control-user" id="apellidos_p-view" placeholder="Apellido Paterno" required>
				        </div>

				        <div class="col-sm-4 text-center valid-required">
				        	<label for=""><br></label>
				            <input type="text" name="apellido_m" class="form-control form-control-user" id="apellidos_m-view" placeholder="Apellido Materno" required>
				        </div>
			  		</div>


			  		<br>


			  		<div class="row">

				        <div class="col-sm-4 text-center valid-required">
				        	<label for=""><br></label>
				            <input type="text" name="n_cedula" class="form-control form-control-user" id="n_cedula-view" placeholder="Numero de Cedula" required>
				        </div>

				        <div class="col-sm-4 valid-required">
				        	<label for=""><b>Fecha de Nacimiento</b></label>
				            <input type="date" name="fecha_nacimiento" class="form-control form-control-user" id="fecha_nacimiento-view" required>
				        </div>

			  			<div class="col-sm-4 text-center valid-required">
			  				<label for=""><br></label>
				            <input type="text" name="telefono" class="form-control form-control-user" id="telefono-view" placeholder="Numero de Telefono" required>
				        </div>

			  		</div>



			  		<div class="row">
			  			<div class="col-sm-12 text-center valid-required">
				        	<label for=""><br></label>
				            <textarea name="direccion" placeholder="Direccion" id="direccion-view" class="form-control" cols="30" rows="10"></textarea>
				        </div>
			  		</div>
					

					<input type="hidden" name="id_user" class="id_user">
					<input type="hidden" name="token" class="token">
			  		<br>

			  		<br>



			  </div>
			  
			</div>


            
            

            <center>

            	<button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro3')">
              		Cancelar
            	</button>

            </center>
          
      
	</div>
</div>