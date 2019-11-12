<div class="card shadow mb-4 hidden" id="cuadro3">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Consulta de Roles</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
      
        @csrf


        <div class="row">
           <div class="col-md-6">
              <div class="form-group valid-required">
                <label for="modulo_vista_registrar"><b>Nombre</b></label>
                <input type="text" name="nombre" class="form-control form-control-user" id="nombre_view" placeholder="Nombre" required>
              </div>
          </div>

           
          <div class="col-sm-6 valid-required">
            <label for="modulo_vista_registrar"><b>Descripcion</b></label>
            <input type="text" name="descripcion" class="form-control form-control-user" id="descripcion_view" placeholder="Descripcion" required>
          </div>

        </div>

        <br>

        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered table-striped table-hover" id="tableView">
              <thead>
                <tr>
                  <th>Función</th>
                  <th>Consulta General</th>
                  <th>Consulta Detallada</th>
                  <th>Registrar</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>


        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">
          <br>
          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro3')">
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

