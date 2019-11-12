<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar de Funciones</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="_method" value="put">


        <div class="row">
           <div class="col-md-4">
              <div class="form-group valid-required">
               <label for=""><b>Nombre</b></label>
                <input type="text" name="nombre" class="form-control form-control-user" id="nombre-edit" placeholder="Nombre" required>
              </div>
          </div>

           
          <div class="col-sm-4 valid-required">
          <label for=""><b>Descripcion</b></label>
            <input type="text" name="descripcion" class="form-control form-control-user" id="descripcion-edit" placeholder="Descripcion" required>
          </div>


          <div class="col-sm-4 valid-required">
          <label for=""><b>Ruta</b></label>
            <input type="text" name="route" class="form-control form-control-user" id="route-edit" placeholder="Ruta" required>
          </div>


          

        </div>


        <div class="row">

        	<div class="col-sm-4 valid-required">
        		<label for=""><b>Modulos</b></label>
	           <select id="modulos_store-edit" required class="form-control form-group" name="id_modulo" >
	            <option value="">Seleccione</option>
	          </select>
	        </div>

	        <div class="col-sm-4 valid-required">
	           <label for=""><b>Posicion</b></label>
	           <select id="posicion_edit" required class="form-control form-group" name="posicion">
	            <option value="">Seleccione</option>
	          </select>
	        </div>


        	<div class="col-sm-4 valid-required">
        	   <label for=""><b>Visible</b></label>
	           <select id="visible-edit" required class="form-control form-group" name="visible">
	            <option value="">Seleccione</option>
	            <option value="1">Si</option>
	            <option value="0">No</option>
	          </select>
	        </div>
        </div>


        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">


        <input type="hidden" name="id_user_edit" id="id_edit">


          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro4')">
                Cancelar
            </button>
            <button class="btn btn-primary btn-user">
                Registrar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

