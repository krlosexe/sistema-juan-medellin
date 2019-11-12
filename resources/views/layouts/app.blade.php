<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>App</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">






  <link href="vendor/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="vendor/bootstrap-fileinput/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>

  <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="vendor/sweetalert/sweetalert.css" rel="stylesheet">


  <link href="vendor/select2-4.0.11/dist/css/select2.min.css" rel="stylesheet" />






   @yield('CustomCss')
  
  @if(Request::path() != '/')

    <script>
      $(document).ready(function(){

        var url = $(location).attr('href').split("/").splice(-1);
         validAuth(false, url[0]);
      });
    </script>

  @endif

</head>

<body class="{{ Request::path() != '/' ? 'dasboard-body' : ''}} bg-gradient-primary">
  <div id="page-loader"  ><span class="preloader-interior"></span></div>

  @yield('content')




   <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Preparado para irme?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" id="logout" href="logout">Cerrar Sesion</a>
        </div>
      </div>
    </div>
  </div>





  <!-- Bootstrap core JavaScript-->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  


   <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  


 <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

  


    <script src="vendor/bootstrap-fileinput/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/js/locales/fr.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/themes/fas/theme.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>





    <script src="vendor/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="vendor/sweetalert/sweetalert-dev.js" type="text/javascript"></script>

    <script src="vendor/select2-4.0.11/dist/js/select2.min.js"></script>


  <script src="js/funciones.js"></script>
  

  <script>
    var user_id = localStorage.getItem('user_id');
    $("#logout").attr("href", "logout/"+user_id)
  </script>


  
  @yield('CustomJs')

  

  

</body>

</html>
