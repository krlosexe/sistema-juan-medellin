<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Clinica</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
      
        @csrf

        <input type="hidden" name="_method" value="put">
        
        <div class="row">
          <div class="col-md-6">
                <label for=""><b>Nombre</b></label>
                <div class="form-group">
                  <input type="text" name="nombre" class="form-control form-control-user" id="nombre-edit" placeholder="Nombre" required>
                </div>
            </div>

            <div class="col-md-6">
              <label for=""><b>Nombre</b></label>
                <div class="form-group valid-required">
                  <select name="id_city" id="city-edit" class="form-control">
                    <option value="">Seleccione</option>
                  </select>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col md-12">
                <label for=""><br><b>Direccion</b></label>
				        <textarea required name="direccion" placeholder="PJ. Calle 47A #6AB-30" id="direccion-edit" class="form-control" cols="30" rows="10"></textarea>
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
            <button id="send_usuario" class="btn btn-primary btn-user">
                Guardar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

