<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro de Clinicas</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
        @csrf

        <div class="row">
           <div class="col-md-6">
             <label for=""><b>Nombre</b></label>
              <div class="form-group valid-required">
                <input type="text" name="nombre" class="form-control form-control-user" id="nombre" placeholder="Nombre" required>
              </div>
          </div>


          <div class="col-md-6">
             <label for=""><b>Ciudad</b></label>
              <div class="form-group valid-required">
                <select name="id_city" id="city-store" class="form-control">
                  <option value="">Seleccione</option>
                </select>
              </div>
          </div>
        </div>


        <div class="row">
            <div class="col md-12">
                <label for=""><br><b>Direccion</b></label>
				        <textarea required name="direccion" placeholder="PJ. Calle 47A #6AB-30" id="direccion" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>




        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">
          <br>
          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro2')">
                Cancelar
            </button>
            <button id="send_usuario" class="btn btn-primary btn-user">
                Registrar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

