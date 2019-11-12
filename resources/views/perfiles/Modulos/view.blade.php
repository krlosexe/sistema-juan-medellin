<div class="card shadow mb-4 hidden" id="cuadro3">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Consulta de Modulos</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
      
        @csrf


        <div class="row">
           <div class="col-md-3">
           <label for=""><b>Nombre</b></label>
              <div class="form-group">
                <input type="text" name="nombre" class="form-control form-control-user" id="nombre-view" placeholder="Nombre" required>
              </div>
          </div>

           
          <div class="col-md-3">
            <label for=""><b>Descripcion</b></label>
            <input type="text" name="descripcion" class="form-control form-control-user" id="descripcion-view" placeholder="Descripcion" required>
          </div>


          <div class="col-md-3">
            <label for=""><b>Icono</b></label>
            <input type="text" name="icon" class="form-control form-control-user" id="icono-view" placeholder="fa fa-users" required>
          </div>



          <div class="col-md-3">
            <label for=""><b>Posicion</b></label>
           <select id="posicion-view" required class="form-control form-group" name="posicion">
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
            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro3')">
                Cancelar
            </button>
          </center>
          <br>
          <br>
      </form>
      
    </div>

