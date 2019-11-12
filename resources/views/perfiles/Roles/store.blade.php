<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro de Roles</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
      
        @csrf


        <div class="row">
           <div class="col-md-6">
              <div class="form-group valid-required">
                <input type="text" name="nombre" class="form-control form-control-user" id="nombre" placeholder="Nombre" required>
              </div>
          </div>

           
          <div class="col-sm-6 valid-required">
            <input type="text" name="descripcion" class="form-control form-control-user" id="descripcion" placeholder="Descripcion" required>
          </div>

        </div>


        <div class="row">
          <div class="col-sm-4">
              <label for="modulo_vista_registrar"><b>Módulos</b></label>
                  <select id="modulos_store" class="form-control form-group" onchange="buscarFunciones(this.value, 'lista_vista_registrar');">
                    <option value="">Seleccione</option>
                   
                  </select>
          </div>
          <div class="col-sm-4">
              <label for="lista_vista_registrar"><b>Funciones</b></label>
                  <select id="lista_vista_registrar" class="form-control form-group">
                    <option value="">Seleccione</option>
                  </select>
          </div>
          <div class="col-sm-2" style="padding-top: 25px;">
            <label for="lista_vista_registrar"><br></label>
            <button type="button" class="btn btn-primary waves-effect" onclick="agregarListaVista('#lista_vista_registrar', '#tableRegistrar', '#modulos_store')">Agregar</button>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered table-striped table-hover" id="tableRegistrar">
              <thead>
                <tr>
                  <th>Función</th>
                  <th>Consulta General</th>
                  <th>Consulta Detallada</th>
                  <th>Registrar</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                  <th>&nbsp;</th>
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

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro2')">
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

