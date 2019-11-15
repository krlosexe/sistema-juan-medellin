@extends('layouts.app')
	

	@section('CustomCss')

		<style>
			.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
			    margin: 0;
			    padding: 0;
			    border: none;
			    box-shadow: none;
			    text-align: center;
			}
			.kv-avatar {
			    display: inline-block;
			}
			.kv-avatar .file-input {
			    display: table-cell;
			    width: 213px;
			}
			.kv-reqd {
			    color: red;
			    font-family: monospace;
			    font-weight: normal;
			}
		</style>


	@endsection


	@section('content')
	     <!-- Page Wrapper -->
		  <div id="wrapper">

		    @include('layouts.sidebar')

		    <!-- Content Wrapper -->
		    <div id="content-wrapper" class="d-flex flex-column">

		      <!-- Main Content -->
		      <div id="content">

				@include('layouts.topBar') 
		       

		        <!-- Begin Page Content -->
			        <div class="container-fluid">

			          <!-- Page Heading -->
			          <h1 class="h3 mb-2 text-gray-800">Hosting</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de Hosting</h6>

			              <button onclick="nuevo()" class="btn btn-primary btn-icon-split" style="float: right;">
		                    <span class="icon text-white-50">
		                      <i class="fas fa-plus"></i>
		                    </span>
		                    <span class="text">Nuevo registro</span>
		                  </button>
			            </div>
			            <div class="card-body">
			              <div class="table-responsive">
			                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
			                  <thead>
			                    <tr>
								  <th>Acciones</th>
								  <th>Nombre</th>
								  <th>Categoria</th>
								  <th>Precio</th>
			                      <th>Fecha de registro</th>
								  <th>Registrado por</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    
			                  </tbody>
			                </table>
			              </div>
			            </div>
			          </div>


			          @include('catalogos.hosting.store')
					  @include('catalogos.hosting.view')
					  @include('catalogos.hosting.edit')


			        </div>
			        <!-- /.container-fluid -->

		      </div>
		      <!-- End of Main Content -->

		      <!-- Footer -->
		      <footer class="sticky-footer bg-white">
		        <div class="container my-auto">
		          <div class="copyright text-center my-auto">
		            <span>Copyright &copy; Your Website 2019</span>
		          </div>
		        </div>
		      </footer>
		      <!-- End of Footer -->

		    </div>
		    <!-- End of Content Wrapper -->

		  </div>
		  <input type="hidden" id="ruta" value="<?= url('/') ?>">
	@endsection





	@section('CustomJs')

		<script>
			$(document).ready(function(){
				store();
				list();
				update();

				$("#collapse_Catálogos").addClass("show");
				$("#nav_hosting, #modulo_Catálogos").addClass("active");

				verifyPersmisos(id_user, tokens, "hosting");
			});



			function update(){
				enviarFormularioPut("#form-update", 'api/hosting', '#cuadro4', false, "#avatar-edit");
			}


			function store(){
				enviarFormulario("#store", 'api/hosting', '#cuadro2');
			}



			function list(cuadro) {
				var data = {
					"id_user": id_user,
					"token"  : tokens,
				};
				$('#table tbody').off('click');
				var url=document.getElementById('ruta').value; 
				cuadros(cuadro, "#cuadro1");

				var table=$("#table").DataTable({
					"destroy":true,
					
					"stateSave": true,
					"serverSide":false,
					"ajax":{
						"method":"GET",
						 "url":''+url+'/api/hosting',
						 "data": {
							"id_user": id_user,
							"token"  : tokens,
						},
						"dataSrc":""
					},
					"columns":[
						{"data": null,
							render : function(data, type, row) {
								var botones = "";
								if(consultar == 1)
									botones += "<span class='consultar btn btn-xs btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
								if(actualizar == 1)
									botones += "<span class='editar btn btn-xs btn-primary waves-effect' data-toggle='tooltip' title='Editar'><i class='fas fa-edit' style='margin-bottom:5px'></i></span> ";
								if(data.status == 1 && actualizar == 1)
									botones += "<span class='desactivar btn btn-xs btn-warning waves-effect' data-toggle='tooltip' title='Desactivar'><i class='fa fa-unlock' style='margin-bottom:5px'></i></span> ";
								else if(data.status == 2 && actualizar == 1)
									botones += "<span class='activar btn btn-xs btn-warning waves-effect' data-toggle='tooltip' title='Activar'><i class='fa fa-lock' style='margin-bottom:5px'></i></span> ";
								if(borrar == 1)
									botones += "<span class='eliminar btn btn-xs btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span>";
								return botones;
							}
						},
						{"data":"name"},
						{"data":"name_category"},
						{"data":"precio"},
						{"data": "fec_regins"},
						{"data": "email_regis"}
						
					],
					"language": idioma_espanol,
					"dom": 'Bfrtip',
					"responsive": true,
					"buttons":[
						'copy', 'csv', 'excel', 'pdf', 'print'
					]
				});


				ver("#table tbody", table)
				edit("#table tbody", table)
				activar("#table tbody", table)
				desactivar("#table tbody", table)
				eliminar("#table tbody", table)


			}



			function nuevo() {
				$("#alertas").css("display", "none");
				$("#store")[0].reset();



				$("#logo").fileinput({
					theme: "fas",
					overwriteInitial: true,
					maxFileSize: 1500,
					showClose: false,
					showCaption: false,
					browseLabel: '',
					removeLabel: '',
					browseIcon: '<i class="fa fa-folder-open"></i>',
					removeIcon: '<i class="fas fa-trash-alt"></i>',
					previewFileIcon: '<i class="fas fa-file"></i>',
					removeTitle: 'Cancel or reset changes',
					elErrorContainer: '#kv-avatar-errors-1',
					msgErrorClass: 'alert alert-block alert-danger',
					defaultPreviewContent: '<img src="img/default-user.png" width="150" alt="Your Avatar">',
					layoutTemplates: {main2: '{preview}  {remove} {browse}'},
					allowedFileExtensions: ["jpg", "png", "gif"],

				});



				GetCategory("#category-store")
				GetBenefy("#benefits-store")
				GetSupport("#customer-support-store")
				GetWayToPay("#way-to-pay-store")
				GetCountries("#country-store")


				cuadros("#cuadro1", "#cuadro2");
			}

			/* ------------------------------------------------------------------------------- */
			/* 
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function ver(tbody, table){
				$(tbody).on("click", "span.consultar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();
					var url=document.getElementById('ruta').value; 

					

					GetCategory("#category-view")
					GetBenefy("#benefits-view")
					GetSupport("#customer-support-view")
					GetWayToPay("#way-to-pay-view")
					GetCountries("#country-view")


					
					$("#name-view").val(data.name).attr("disabled", "disabled")
					$("#precio-view").val(data.precio).attr("disabled", "disabled")
					$("#url-view").val(data.url).attr("disabled", "disabled")
					$("#description-view").val(data.description).attr("disabled", "disabled")

					$("#category-view").val(data.category).attr("disabled", "disabled")


					var benefitsArray = [];
					$.each(data.benefits,function(i, item){
						benefitsArray.push(item.id_benefits);
					})
					$("#benefits-view").val(benefitsArray).trigger("change").attr("disabled", "disabled")



					var SupportArray = [];
					$.each(data.support,function(i, item){
						SupportArray.push(item.id_customer_support);
					})
					$("#customer-support-view").val(SupportArray).trigger("change").attr("disabled", "disabled")



					var WaytoPayArray = [];
					$.each(data.way_to_pay,function(i, item){
						WaytoPayArray.push(item.id_way_to_pay);
					})
					$("#way-to-pay-view").val(WaytoPayArray).trigger("change").attr("disabled", "disabled")

					$("#country-view").val(data.country).attr("disabled", "disabled")



					if(data.garantia == 1){
						$("#garantia_view").prop("checked", true)
					}else{
						$("#garantia_view").prop("checked", false)
					}


					if(data.ssl_free == 1){
						$("#ssl_free_view").prop("checked", true)
					}else{
						$("#ssl_free_view").prop("checked", false)
					}

					if(data.domain == 1){
						$("#domain_view").prop("checked", true)
					}else{
						$("#domain_view").prop("checked", false)
					}


					if(data.support_spanish == 1){
						$("#support_spanish_view").prop("checked", true)
					}else{
						$("#support_spanish_view").prop("checked", false)
					}
					

					url_imagen = '/img/hosting/'

					if(data.logo != ""){
						img = '<img src="'+url_imagen+data.logo+'" class="file-preview-image kv-preview-data">'
					}else{rfc2c = ""}


					$('#logo-view').fileinput('destroy');
					
					$("#logo-view").fileinput({
						theme: "fas",
						overwriteInitial: true,
						maxFileSize: 1500,
						showClose: false,
						showCaption: false,
						browseLabel: '',
						removeLabel: '',
						browseIcon: '<i class="fa fa-folder-open"></i>',
						removeIcon: '<i class="fas fa-trash-alt"></i>',
						previewFileIcon: '<i class="fas fa-file"></i>',
						removeTitle: 'Cancel or reset changes',
						elErrorContainer: '#kv-avatar-errors-1',
						msgErrorClass: 'alert alert-block alert-danger',
						defaultPreviewContent: '<img src="img/default-user.png" width="150" alt="Your Avatar">',
						layoutTemplates: {main2: '{preview}  {remove} {browse}'},
						allowedFileExtensions: ["jpg", "png", "gif"],
						initialPreview: [ 
							img
						],
						initialPreviewConfig: [
								
							{caption: data.img_profile , downloadUrl: url_imagen+data.img_profile  ,url: url+"uploads/delete", key: data.img_profile}
					
						],

					});


					
					cuadros('#cuadro1', '#cuadro3');
				});
			}



			/* ------------------------------------------------------------------------------- */
			/* 
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function edit(tbody, table){
				$(tbody).on("click", "span.editar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();

					var url=document.getElementById('ruta').value; 

					

					GetCategory("#category-edit")
					GetBenefy("#benefits-edit")
					GetSupport("#customer-support-edit")
					GetWayToPay("#way-to-pay-edit")
					GetCountries("#country-edit")


					
					$("#name-edit").val(data.name)
					$("#precio-edit").val(data.precio)
					$("#url-edit").val(data.url)
					$("#description-edit").val(data.description)

					$("#category-edit").val(data.category)


					var benefitsArray = [];
					$.each(data.benefits,function(i, item){
						benefitsArray.push(item.id_benefits);
					})
					$("#benefits-edit").val(benefitsArray).trigger("change")



					var SupportArray = [];
					$.each(data.support,function(i, item){
						SupportArray.push(item.id_customer_support);
					})
					$("#customer-support-edit").val(SupportArray).trigger("change")



					var WaytoPayArray = [];
					$.each(data.way_to_pay,function(i, item){
						WaytoPayArray.push(item.id_way_to_pay);
					})
					$("#way-to-pay-edit").val(WaytoPayArray).trigger("change")

					$("#country-edit").val(data.country)





					if(data.garantia == 1){
						$("#garantia_edit").prop("checked", true)
					}else{
						$("#garantia_edit").prop("checked", false)
					}


					if(data.ssl_free == 1){
						$("#ssl_free_edit").prop("checked", true)
					}else{
						$("#ssl_free_edit").prop("checked", false)
					}

					if(data.domain == 1){
						$("#domain_edit").prop("checked", true)
					}else{
						$("#domain_edit").prop("checked", false)
					}


					if(data.support_spanish == 1){
						$("#support_spanish_edit").prop("checked", true)
					}else{
						$("#support_spanish_edit").prop("checked", false)
					}








					url_imagen = '/img/hosting/'

					if(data.logo != ""){
						img = '<img src="'+url_imagen+data.logo+'" class="file-preview-image kv-preview-data">'
					}else{rfc2c = ""}


					$('#logo-edit').fileinput('destroy');
					
					$("#logo-edit").fileinput({
						theme: "fas",
						overwriteInitial: true,
						maxFileSize: 1500,
						showClose: false,
						showCaption: false,
						browseLabel: '',
						removeLabel: '',
						browseIcon: '<i class="fa fa-folder-open"></i>',
						removeIcon: '<i class="fas fa-trash-alt"></i>',
						previewFileIcon: '<i class="fas fa-file"></i>',
						removeTitle: 'Cancel or reset changes',
						elErrorContainer: '#kv-avatar-errors-1',
						msgErrorClass: 'alert alert-block alert-danger',
						defaultPreviewContent: '<img src="img/default-user.png" width="150" alt="Your Avatar">',
						layoutTemplates: {main2: '{preview}  {remove} {browse}'},
						allowedFileExtensions: ["jpg", "png", "gif"],
						initialPreview: [ 
							img
						],
						initialPreviewConfig: [
								
							{caption: data.img_profile , downloadUrl: url_imagen+data.img_profile  ,url: url+"uploads/delete", key: data.img_profile}
					
						],

					});
					cuadros('#cuadro1', '#cuadro4');
					$("#id_edit").val(data.id_hosting)
					cuadros('#cuadro1', '#cuadro4');
				});
			}



					
		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function desactivar(tbody, table){
				$(tbody).on("click", "span.desactivar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-hosting/'+data.id_hosting+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
				});
			}
		/* ------------------------------------------------------------------------------- */

		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function activar(tbody, table){
				$(tbody).on("click", "span.activar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-hosting/'+data.id_hosting+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-hosting/'+data.id_hosting+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}


		</script>
		



	@endsection


