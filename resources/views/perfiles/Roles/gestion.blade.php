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
			          <h1 class="h3 mb-2 text-gray-800">Roles</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de roles</h6>

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
			                      <th>Descripcion</th>
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


			          @include('perfiles.Roles.store')
					  @include('perfiles.Roles.view')
					  @include('perfiles.Roles.edit')


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

				$("#collapse_Perfiles").addClass("show");
				$("#nav_rol, #modulo_Perfiles").addClass("active");

				verifyPersmisos(id_user, tokens, "rol");
			});

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
						 "url":''+url+'/api/roles',
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
						{"data":"nombre_rol"},
						{"data":"descripcion_rol"},
						{"data":"fec_regins"},
						{"data":"email"},
						
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

				listModulos("#modulos_store");

				cuadros("#cuadro1", "#cuadro2");
			}





			function listModulos(select) {
				var url=document.getElementById('ruta').value;
			    $.ajax({
			        url:''+url+'/api/modulos',
			        type:'GET',
			        data: {
							"id_user": id_user,
							"token"  : tokens,
						},
			        dataType:'JSON',
			        async: false,
			        beforeSend: function(){
			           // mensajes('info', '<span>Buscando, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');
			        },
			        error: function (data) {
			            //mensajes('danger', '<span>Ha ocurrido un error, por favor intentelo de nuevo</span>');         
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
			                        value: item.id_modulo,
			                        text : item.nombre
			                    }));
			                }
			            });

			        }
			    });
			}


			/* ------------------------------------------------------------------------------- */
				/*
					Funcion que hace una busqueda de las funciones del modulo seleccionado
				*/
				function buscarFunciones(id_modulo, funciones){
					var url=document.getElementById('ruta').value;
					if (id_modulo != "") {
						eliminarOptions(funciones);
						$.ajax({
			                url:''+url+'/api/funciones',
			                type: 'GET',
			                dataType: 'JSON',
			                data:{
			                    "id_user"   : id_user,
							    "token"     : tokens,
			                },
			                success: function(respuesta){
			                    respuesta.forEach(function(campo, index){

			                    	if (id_modulo == campo.id_modulo) {
			                        	agregarOptions("#"+ funciones, campo.id_funciones, campo.nombre);
			                    	}
			                    });
			                }
			            });
					} else {
						warning('¡Debe seleccionar una opción!');
					}
				}

				/* ------------------------------------------------------------------------------- */
			/*
				Funcion que agrega las lista ista a la tabla
			*/
			function agregarListaVista(select, tabla, modulo){
				var idModulo = $(modulo).val();
				var nombreModulo = $(modulo + " option:selected").html();
				var value = $(select).val();
				var text = $(select + " option:selected").html();
				var validadoLista = false;
				var validadoModulo = false;
				var html = '';
				$(tabla + " tbody tr").each(function() {
					if (idModulo == $(this).find(".id_modulo_vista").val()) {
						validadoModulo = true;
					}
				});
				if (value != "") {
					$(tabla + " tbody tr").each(function() {
					  	if (value == $(this).find(".id_lista_vista").val())
					  		validadoLista = true;
					});
					if (!validadoModulo) {
						html += "<tr style='background-color: #eee;' id='mv" + idModulo + "'><td colspan='7'><b>" + nombreModulo + "</b><input type='hidden' class='id_modulo_vista' value='" + idModulo + "'></td></tr>";
					}
					if (!validadoLista) {
						html += "<tr id='r" + value + "'><td>" + text + " <input type='hidden' class='id_lista_vista' name='id_lista_vista' value='" + value + "'></td>";
						html += "<td>" + agregarCheckbox(value, 'general', 1) + "</td>";
						html += "<td>" + agregarCheckbox(value, 'detallada', 1) + "</td>";
						html += "<td>" + agregarCheckbox(value, 'registrar', 1) + "</td>";
						html += "<td>" + agregarCheckbox(value, 'actualizar', 1) + "</td>";
						html += "<td>" + agregarCheckbox(value, 'eliminar', 1) + "</td>";
						html += "<td><button type='button' class='btn btn-danger waves-effect' onclick='eliminarListaVista(\"" + "#r" + value + "\")'>Eliminar</button></td></tr>";
						if (validadoModulo) {
							$(tabla + " tbody #mv" + idModulo).after(html);
						} else {
							$(tabla + " tbody").append(html);
						}
					} else {
						warning('¡La opción seleccionada ya se encuentra agregada!');
					}
					$(select + " option[value='']").attr("selected","selected");
				} else {
					warning('¡Debe seleccionar una opción!');
				}
			}

			/* ------------------------------------------------------------------------------- */
			/*
				Funcion que agrega las lista ista a la tabla
			*/
			function eliminarListaVista(tr){
				$(tr).remove(); 
			}

			/* ------------------------------------------------------------------------------- */
			/*
				Funcion que realiza el envio del formulario de registro
			*/
			function store(){
				$("#store").submit(function(e){
		            e.preventDefault(); //previene el comportamiento por defecto del formulario al darle click al input submit
		            var nombre = $("#nombre").val();
		            var descripcion = $("#descripcion").val();
		            var objeto = [];
		            $("#tableRegistrar tbody tr").each(function() {
		            	var lista_vista = [];
		            	var id = $(this).find(".id_lista_vista").val();
		            	if (id != undefined){
			            	lista_vista.push(id);
			            	lista_vista.push(verificarCheckbox('general' + id));
			            	lista_vista.push(verificarCheckbox('detallada' + id));
			            	lista_vista.push(verificarCheckbox('registrar' + id));
			            	lista_vista.push(verificarCheckbox('actualizar' + id));
			            	lista_vista.push(verificarCheckbox('eliminar' + id));
							objeto.push(lista_vista);
						}
					});

		            $('input[type="submit"]').attr('disabled','disabled'); //desactiva el input submit
		            var url=document.getElementById('ruta').value;
		            $.ajax({
		                url:''+url+'/api/roles',
		                type: 'POST',
		                dataType:'JSON',
		                data:{
		                	'nombre_rol'      : nombre,
		                	'descripcion_rol' : descripcion,
		                	'permisos'        : objeto,
		                	'id_user'         : id_user,
							'token'           : tokens
		                },
		                cache:false,
		                beforeSend: function(){
		                    mensajes('info', '<span>Guardando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');
		                },
		                error: function (repuesta) {
		                    $('input[type="submit"]').removeAttr('disabled'); //activa el input submit
		                    var errores=repuesta.responseText;
		                    if(errores!="")
		                        mensajes('danger', errores);
		                    else
		                        mensajes('danger', "<span>Ha ocurrido un error, por favor intentelo de nuevo.</span>");        
		                },
		                success: function(respuesta){
		                    $('input[type="submit"]').removeAttr('disabled'); //activa el input submit
		                    mensajes('success', respuesta.mensagge);
		                    list('#cuadro2');
		                }
		            });
		        });
			}







			/* ------------------------------------------------------------------------------- */
			/*
				Funcion que realiza el envio del formulario de registro
			*/
			function update(){
				$("#update").submit(function(e){
		            e.preventDefault(); //previene el comportamiento por defecto del formulario al darle click al input submit
		            var nombre      = $("#nombre_edit").val();
		            var descripcion = $("#descripcion_edit").val();
		            var objeto      = [];
		            $("#tableEditar tbody tr").each(function() {
		            	var lista_vista = [];
		            	var id = $(this).find(".id_lista_vista").val();
		            	if (id != undefined){
			            	lista_vista.push(id);
			            	lista_vista.push(verificarCheckbox('general' + id));
			            	lista_vista.push(verificarCheckbox('detallada' + id));
			            	lista_vista.push(verificarCheckbox('registrar' + id));
			            	lista_vista.push(verificarCheckbox('actualizar' + id));
			            	lista_vista.push(verificarCheckbox('eliminar' + id));
							objeto.push(lista_vista);
						}
					});

					var id_rol = $("#id_edit").val()

		            $('input[type="submit"]').attr('disabled','disabled'); //desactiva el input submit
		            var url=document.getElementById('ruta').value;
		            $.ajax({
		                url:''+url+'/api/roles/'+id_rol,
		                type: 'POST',
		                dataType:'JSON',
		                data:{
		                	'nombre_rol'      : nombre,
		                	'descripcion_rol' : descripcion,
		                	'permisos'        : objeto,
		                	'id_user'         : id_user,
							'token'           : tokens,
							'_method'         : 'put'
		                },
		                cache:false,
		                beforeSend: function(){
		                    mensajes('info', '<span>Guardando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');
		                },
		                error: function (repuesta) {
		                    $('input[type="submit"]').removeAttr('disabled'); //activa el input submit
		                    var errores=repuesta.responseText;
		                    if(errores!="")
		                        mensajes('danger', errores);
		                    else
		                        mensajes('danger', "<span>Ha ocurrido un error, por favor intentelo de nuevo.</span>");        
		                },
		                success: function(respuesta){
		                    $('input[type="submit"]').removeAttr('disabled'); //activa el input submit
		                    mensajes('success', respuesta.mensagge);
		                    list('#cuadro4');
		                }
		            });
		        });
			}





			function ShowRolOperaciones(table, data){
				
				var html     = "";
				var validado = false;
				var modulo   = 0;

				$.each(data, function (i, item) { 
					console.log(item)	

					if (modulo != item.id_modulo) {
	            		modulo = item.id_modulo;
	            		validado = false;
					}


					if (!validado){
		            	html += "<tr style='background-color: #eee;'><th colspan='6'>" + item.name_modulo + "</th></tr>";
		            	validado = true;
					}
					html += "<tr>"					
						html += "<td>"+item.name_funcion+"</td>"
						html += "<td>"+validarPermisoListaVista(item.general)+"</td>"
						html += "<td>"+validarPermisoListaVista(item.detallada)+"</td>"
						html += "<td>"+validarPermisoListaVista(item.registrar)+"</td>"
						html += "<td>"+validarPermisoListaVista(item.actualizar)+"</td>"
						html += "<td>"+validarPermisoListaVista(item.eliminar)+"</td>"
					html += "</tr>"					
				});

				$(table).html(html)
			}







			function ShowRolOperacionesEdit(table, data){
				
				var html     = "";
				var validado = false;
				var modulo   = 0;

				$.each(data, function (i, item) { 

					if (modulo != item.id_modulo) {
	            		modulo = item.id_modulo;
	            		validado = false;
					}


					if (!validado){
		            	html += "<tr style='background-color: #eee;'><th colspan='7'>" + item.name_modulo + "</th></tr>";
		            	validado = true;
					}

					html += "<tr id='tr_" + item.id_funciones + "'>"					
						html += "<td>"+item.name_funcion+"<input type='hidden' class='id_lista_vista' name='id_lista_vista' value='" + item.id_funciones + "'></td>"
						html += "<td>" + agregarCheckbox(item.id_funciones, 'general', item.general) + "</td>";
						html += "<td>" + agregarCheckbox(item.id_funciones, 'detallada', item.detallada) + "</td>";
						html += "<td>" + agregarCheckbox(item.id_funciones, 'registrar', item.registrar) + "</td>";
						html += "<td>" + agregarCheckbox(item.id_funciones, 'actualizar', item.actualizar) + "</td>";
						html += "<td>" + agregarCheckbox(item.id_funciones, 'eliminar', item.eliminar) + "</td>";
						html += "<td><button type='button' class='btn btn-danger waves-effect' onclick='eliminarRolOperacion(" + item.id_funciones + ")'>Eliminar</button></td></tr>";
					html += "</tr>"					
				});

				$(table).html(html)
			}


			function eliminarRolOperacion(id) {
				$("#tr_"+id).remove()
			}


			
			/* ------------------------------------------------------------------------------- */
				/*
					Funcion que valida true o false de las operaciones que hacen por lista vista.
				*/
				function validarPermisoListaVista(operacion){
					var check = '<i class="fas fa-check col-green" aria-hidden="true"></i>';
					var close = '<i class="fa fa-times col-red" aria-hidden="true"></i>';
					if(operacion == 1)
						return check;
					else if (operacion == 0)
						return close;
				}



			/* ------------------------------------------------------------------------------- */
			/* 
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function ver(tbody, table){
				$(tbody).on("click", "span.consultar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();
					 
					$("#nombre_view").val(data.nombre_rol).attr("disabled", "disabled")
					$("#descripcion_view").val(data.descripcion_rol).attr("disabled", "disabled")

					ShowRolOperaciones("#tableView tbody", data.rol_operaciones)
					
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

					listModulos("#modulos_store_edit");


					$("#nombre_edit").val(data.nombre_rol)
					$("#descripcion_edit").val(data.descripcion_rol)

					ShowRolOperacionesEdit("#tableEditar tbody", data.rol_operaciones)
					
					cuadros('#cuadro1', '#cuadro4');
					$("#id_edit").val(data.id_rol)
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
						statusConfirmacion('api/status-rol/'+data.id_rol+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
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
						statusConfirmacion('api/status-rol/'+data.id_rol+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
					});
				}
			/* ------------------------------------------------------------------------------- */



				function eliminar(tbody, table){
					$(tbody).on("click", "span.eliminar", function(){
						var data=table.row($(this).parents("tr")).data();
						statusConfirmacion('api/status-rol/'+data.id_rol+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
					});
				}

		</script>

	@endsection


