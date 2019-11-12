<div class="card shadow mb-4 hidden" id="cuadro3">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Consulta de Hosting</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
      
        @csrf

        <div class="row">
					
            <div class="col-md-6">
              <div class="row">
                <div class="col-sm-12 text-center">
                        <div class="kv-avatar">
                            <div class="file-loading">
                                <input id="logo-view" name="logo_file" type="file" required disabled>
                            </div>
                        </div>
                        <div class="kv-avatar-hintss">
                            <small>Seleccione un logo</small>
                        </div>
                    </div>
              </div>
            </div>


				  	<div class="col-md-6">
			          <div class="row">
                 <div class="col-md-6">
                      <label for="">Nombre</label>
                      <input type="text" name="name"  class="form-control form-control-user" id="name-view" placeholder="Nombre" required>
                  </div>

                  <div class="col-md-6">
                        <label for="">Precio</label>
                        <input style="text-align: right;" type="text" name="precio" class="form-control form-control-user" id="precio-view" placeholder="Precio" required>
                  </div>                  
                </div>


                <div class="row">
                  <div class="col-md-12">
                        <label for="">Categoria</label>
                        <select name="category" id="category-view" class="form-control select2" required>
                          <option value="">Seleccione</option>
                        </select>
                  </div>                    
                </div>



                <div class="row">
                  <div class="col-md-6">
                      <label for="">Beneficios</label>
                      <select name="benefits[]" id="benefits-view" class="form-control select2" required multiple>
                        <option value="">Seleccione</option>
                      </select>
                  </div>

                  <div class="col-md-6">
                        <label for="">Atencion al Cliente</label>
                        <select name="customer-support[]" id="customer-support-view" class="form-control select2" required multiple>
                          <option value="">Seleccione</option>
                        </select>
                  </div>                   
                </div>




                <div class="row">
                  <div class="col-md-6">
                      <label for="">Formas de Pago</label>
                      <select name="way-to-pay[]" id="way-to-pay-view" class="form-control select2" required multiple>
                        <option value="">Seleccione</option>
                      </select>
                  </div>

                  <div class="col-md-6">
                        <label for="">Pais</label>
                        <select name="country" id="country-view" class="form-control select2" required>
                          <option value="">Seleccione</option>
                        </select>
                  </div>                   
                </div>
                
				  	</div>
				</div>




        <div class="row">
            <div class="col-sm-12 valid-required">
                <label for="">Descripcion<br></label>
                  <textarea name="description" placeholder="Descripcion" id="description-view" class="form-control" cols="30" rows="10" required></textarea>
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

