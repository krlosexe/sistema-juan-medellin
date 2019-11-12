<div class="card shadow mb-4 hidden" id="cuadro3">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Consulta de Funciones</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
        @csrf
        <div class="row">
           <div class="col-md-4">
              <div class="form-group valid-required">
               <label for=""><b>Nombre</b></label>
                <input type="text" name="nombre" class="form-control form-control-user" id="nombre-view" placeholder="Nombre" required>
              </div>
          </div>

           
          <div class="col-sm-4 valid-required">
          <label for=""><b>Descripcion</b></label>
            <input type="text" name="descripcion" class="form-control form-control-user" id="descripcion-view" placeholder="Descripcion" required>
          </div>


          <div class="col-sm-4 valid-required">
          <label for=""><b>Ruta</b></label>
            <input type="text" name="route" class="form-control form-control-user" id="route-view" placeholder="Ruta" required>
          </div>


          

        </div>


        <div class="row">

        	<div class="col-sm-4 valid-required">
        		<label for=""><b>Modulos</b></label>
	           <select id="modulos_store-view" required class="form-control form-group" name="id_modulo" >
	            <option value="">Seleccione</option>
	          </select>
	        </div>

	        <div class="col-sm-4 valid-required">
	           <label for=""><b>Posicion</b></label>
	           <select id="posicion_view" required class="form-control form-group" name="posicion">
	            <option value="">Seleccione</option>
	          </select>
	        </div>


        	<div class="col-sm-4 valid-required">
        	   <label for=""><b>Visible</b></label>
	           <select id="visible-view" required class="form-control form-group" name="visible">
	            <option value="">Seleccione</option>
	            <option value="1">Si</option>
	            <option value="0">No</option>
	          </select>
	        </div>
        </div>


        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">
          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro3')">
                Cancelar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

