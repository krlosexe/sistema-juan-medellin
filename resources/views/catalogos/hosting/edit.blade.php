<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Beneficios</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
      
        @csrf

        <input type="hidden" name="_method" value="put">
        
        <div class="row">
					
            <div class="col-md-6">
              <div class="row">
                <div class="col-sm-12 text-center">
                        <div class="kv-avatar">
                            <div class="file-loading">
                                <input id="logo-edit" name="logo_file" type="file" required disabled>
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
                      <input type="text" name="name"  class="form-control form-control-user" id="name-edit" placeholder="Nombre" required>
                  </div>

                  <div class="col-md-6">
                        <label for="">Precio</label>
                        <input style="text-align: right;" type="text" name="precio" class="form-control form-control-user" id="precio-edit" placeholder="Precio" required>
                  </div>                  
                </div>


                <div class="row">
                  <div class="col-md-12">
                        <label for="">Categoria</label>
                        <select name="category" id="category-edit" class="form-control select2" required>
                          <option value="">Seleccione</option>
                        </select>
                  </div>                    
                </div>



                <div class="row">
                  <div class="col-md-6">
                      <label for="">Beneficios</label>
                      <select name="benefits[]" id="benefits-edit" class="form-control select2" required multiple>
                        <option value="">Seleccione</option>
                      </select>
                  </div>

                  <div class="col-md-6">
                        <label for="">Atencion al Cliente</label>
                        <select name="customer-support[]" id="customer-support-edit" class="form-control select2" required multiple>
                          <option value="">Seleccione</option>
                        </select>
                  </div>                   
                </div>




                <div class="row">
                  <div class="col-md-6">
                      <label for="">Formas de Pago</label>
                      <select name="way-to-pay[]" id="way-to-pay-edit" class="form-control select2" required multiple>
                        <option value="">Seleccione</option>
                      </select>
                  </div>

                  <div class="col-md-6">
                        <label for="">Pais</label>
                        <select name="country" id="country-edit" class="form-control select2" required>
                          <option value="">Seleccione</option>
                        </select>
                  </div>                   
                </div>
                
				  	</div>
				</div>




        <div class="row">
            <div class="col-sm-12 valid-required">
                <label for="">Descripcion<br></label>
                  <textarea name="description" placeholder="Descripcion" id="description-edit" class="form-control" cols="30" rows="10" required></textarea>
            </div>
			  </div>

        <input type="hidden" name="inicial" id="inicial">
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

