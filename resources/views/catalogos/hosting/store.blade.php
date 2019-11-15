<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro de Hosting</h6>
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
                            <input id="logo" name="logo_file" type="file" required>
                        </div>
                    </div>
                    <div class="kv-avatar-hintss">
                        <small>Seleccione un logo</small>
                    </div>
                </div>
              </div>

              <br>
              <br>

              <div class="row">
                <div class="col-md-3">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="garantia" name="garantia" checked="checked">
                      <label class="custom-control-label" for="garantia">Garantia de 30 Dias</label>
                    </div>
                  </div>


                  <div class="col-md-3">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="ssl_free" name="ssl_free" checked="checked">
                      <label class="custom-control-label" for="ssl_free">SSL Gratuito</label>
                    </div>
                  </div>


                  <div class="col-md-3">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="domain" name="domain" checked="checked">
                      <label class="custom-control-label" for="domain">Dominio incluido</label>
                    </div>
                  </div>


                  <div class="col-md-3">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="support_spanish" name="support_spanish" checked="checked">
                      <label class="custom-control-label" for="support_spanish">Soporte en Español</label>
                    </div>
                  </div>
                </div>
              </div>
              

				  	<div class="col-md-6">
			          <div class="row">
                 <div class="col-md-6">
                      <label for="">Nombre</label>
                      <input type="text" name="name"  class="form-control form-control-user" id="name-store" placeholder="Nombre" required>
                  </div>

                  <div class="col-md-6">
                        <label for="">Precio</label>
                        <input style="text-align: right;" type="text" name="precio" class="form-control form-control-user" id="precio-store" placeholder="Precio" required>
                  </div>    

                  <div class="col-md-12">
                        <label for="">URL</label>
                        <input type="text" name="url" class="form-control form-control-user" id="url-store" placeholder="Url" required>
                  </div>    


                </div>


                <div class="row">
                  <div class="col-md-12">
                        <label for="">Categoria</label>
                        <select name="category" id="category-store" class="form-control select2" required>
                          <option value="">Seleccione</option>
                        </select>
                  </div>                    
                </div>



                <div class="row">
                  <div class="col-md-6">
                      <label for="">Beneficios</label>
                      <select name="benefits[]" id="benefits-store" class="form-control select2" required multiple>
                        <option value="">Seleccione</option>
                      </select>
                  </div>

                  <div class="col-md-6">
                        <label for="">Atencion al Cliente</label>
                        <select name="customer-support[]" id="customer-support-store" class="form-control select2" required multiple>
                          <option value="">Seleccione</option>
                        </select>
                  </div>                   
                </div>




                <div class="row">
                  <div class="col-md-6">
                      <label for="">Formas de Pago</label>
                      <select name="way-to-pay[]" id="way-to-pay-store" class="form-control select2" required multiple>
                        <option value="">Seleccione</option>
                      </select>
                  </div>

                  <div class="col-md-6">
                        <label for="">Pais</label>
                        <select name="country" id="country-store" class="form-control select2" required>
                          <option value="">Seleccione</option>
                        </select>
                  </div>                   
                </div>








                
				  	</div>
				</div>


        <br>
              <br>

        <div class="row">
            <div class="col-sm-12 valid-required">
                <label for="">Descripcion<br></label>
                  <textarea name="description" placeholder="Descripcion" id="description-store" class="form-control" cols="30" rows="10" required></textarea>
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

