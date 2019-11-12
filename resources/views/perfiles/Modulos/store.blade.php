<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro de Modulos</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
      
        @csrf


        <div class="row">
           <div class="col-md-3">
             <label for=""><b>Nombre</b></label>
              <div class="form-group valid-required">
                <input type="text" name="nombre" class="form-control form-control-user" id="nombre" placeholder="Nombre" required>
              </div>
          </div>

           
          <div class="col-sm-3">
           <label for=""><b>Descripcion</b></label>
            <input type="text" name="descripcion" class="form-control form-control-user" id="descripcion" placeholder="Descripcion" required>
          </div>


          <div class="col-sm-3">
           <label for=""><b>Icono</b></label>
            <input type="text" name="icon" class="form-control form-control-user" id="descripcion" placeholder="fa fa-config" required>
          </div>


          <div class="col-sm-3">
            <label for=""><b>Posicion</b></label>
           <select id="posicion_modulo_vista_registrar" required class="form-control form-group" name="posicion">
            <option value="">Seleccione</option>
          </select>
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

