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
			          <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de usuarios</h6>

			              <button onclick="nuevo()" id="btn-new" class="btn btn-primary btn-icon-split" style="float: right;">
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
			                      <th>Nombres</th>
			                      <th>Apellidos</th>
			                      <th>Email</th>
			                      <th>Telefono</th>
								  <th>Rol</th>
								  <th>Fecha de Registro</th>
								  <th>Registrado por</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    
			                  </tbody>
			                </table>
			              </div>
			            </div>
			          </div>


			          @include('perfiles.Users.store')
					  @include('perfiles.Users.view')
					  @include('perfiles.Users.edit')


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
				update();
				list();
				verifyPersmisos(id_user, tokens, "users");
				
				$("#collapse_Perfiles").addClass("show");
				$("#nav_users, #modulo_Perfiles").addClass("active");
			});

			function store(){
				enviarFormulario("#store", 'api/user', '#cuadro2');
			}

			function update(){
				enviarFormularioPut("#form-update", 'api/user', '#cuadro4', false, "#avatar-edit");
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
						 "url":''+url+'/api/user',
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
						{"data":"nombres"},
						{"data":"apellido_p"},
						{"data":"email"},
						{"data":"telefono"},
						{"data":"nombre_rol"},
						{"data":"fec_regins"},
						{"data":"user_registro"}
						
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

				$('.tab_content0').removeClass("active in");$('#tab0').removeClass("active");
		        $('.tab_content1').removeClass("active in");$('#tab1').removeClass("active");
		        $('.tab_content2').removeClass("active in");$('#tab2').removeClass("active");
		        $('.tab_content3').removeClass("active in");$('#tab3').removeClass("active");
		        $('.tab_content4').removeClass("active in");$('#tab4').removeClass("active");
		        $('.tab_content5').removeClass("active in");$('#tab5').removeClass("active");
		        $('.tab_content6').removeClass("active in");$('#tab6').removeClass("active");
		        $('.tab_content80').removeClass("active in");$('#tab80').removeClass("active");
		        
		        $('.tab_content0').addClass("active in show");$('#tab0').addClass("active");

				$("#avatar-1").fileinput({
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


				GetRoles("#rol")

				cuadros("#cuadro1", "#cuadro2");
			}


			function GetRoles(select){
				var url=document.getElementById('ruta').value; 

				var data = {
					"id_user": id_user,
					"token"  : tokens,
				};
				$.ajax({
					url:''+url+'/api/roles',
					type:"GET",
					data: data,
					dataType:'JSON',
					async: false,
					beforeSend: function(){
					
					},
					error: function (repuesta) {
						
					},
					success: function(data){
						$(select+" option").remove();
			            $(select).append($('<option>',
			            {
			                value: "null",
			                text : "Todos"
			            }));
			            $.each(data, function(i, item){
			                if (item.status == 1) {
			                    $(select).append($('<option>',
			                     {
			                        value: item.id_rol,
			                        text : item.nombre_rol
			                    }));
			                }
			            });
					}

				});
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

					$("#store")[0].reset();

					$('.tab_content0-0').removeClass("active in");$('#tab0-0').removeClass("active");
					$('.tab_content1-1').removeClass("active in");$('#tab1-1').removeClass("active");
					$('.tab_content2-2').removeClass("active in");$('#tab2-2').removeClass("active");
					$('.tab_content3-3').removeClass("active in");$('#tab3-').removeClass("active");
					$('.tab_content4-4').removeClass("active in");$('#tab4-4').removeClass("active");
					$('.tab_content5-5').removeClass("active in");$('#tab5-5').removeClass("active");
					$('.tab_content6-6').removeClass("active in");$('#tab6-6').removeClass("active");
					
					$('.tab_content0-0').addClass("active in show");$('#tab0-0').addClass("active");
				

					$('#avatar-view').fileinput('destroy');



					

					url_imagen = '/img/usuarios/profile/'

					if(data.img_profile != ""){
						img = '<img src="'+url_imagen+data.img_profile+'" class="file-preview-image kv-preview-data">'
					}else{rfc2c = ""}
					
					$("#avatar-view").fileinput({
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

					GetRoles("#rol-view")

					$("#email-view").val(data.email).attr("disabled", "disabled")
					$("#rol-view").val(data.id_rol).attr("disabled", "disabled")
					$("#avatar-view").attr("disabled", "disabled")

					$("#nombres-view").val(data.nombres).attr("disabled", "disabled")
					$("#apellidos_p-view").val(data.apellido_p).attr("disabled", "disabled")
					$("#apellidos_m-view").val(data.apellido_m).attr("disabled", "disabled")
					$("#n_cedula-view").val(data.n_cedula).attr("disabled", "disabled")
					$("#fecha_nacimiento-view").val(data.fecha_nacimiento).attr("disabled", "disabled")
					$("#telefono-view").val(data.telefono).attr("disabled", "disabled")
					$("#direccion-view").val(data.direccion).attr("disabled", "disabled")

					

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

					$("#form-update")[0].reset();

					$('.tab_content1-0').removeClass("active in");$('#tab1-0').removeClass("active");
					$('.tab_content2-1').removeClass("active in");$('#tab2-1').removeClass("active");

					$('.tab_content1-0').addClass("active in show");$('#tab1-0').addClass("active");
				

					$('#avatar-edit').fileinput('destroy');



					

					url_imagen = '/img/usuarios/profile/'

					if(data.img_profile != ""){
						img = '<img src="'+url_imagen+data.img_profile+'" class="file-preview-image kv-preview-data">'
					}else{rfc2c = ""}
					
					$("#avatar-edit").fileinput({
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

					GetRoles("#rol-edit")

					$("#email-edit").val(data.email)
					$("#rol-edit").val(data.id_rol)

					$("#nombres-edit").val(data.nombres)
					$("#apellidos_p-edit").val(data.apellido_p)
					$("#apellidos_m-edit").val(data.apellido_m)
					$("#n_cedula-edit").val(data.n_cedula)
					$("#fecha_nacimiento-edit").val(data.fecha_nacimiento)
					$("#telefono-edit").val(data.telefono)
					$("#direccion-edit").val(data.direccion)

					$("#id_edit").val(data.id)

					

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
					statusConfirmacion('api/status-user/'+data.id+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
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
					statusConfirmacion('api/status-user/'+data.id+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-user/'+data.id+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}






		</script>
		
	@endsection


