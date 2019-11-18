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
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="vendors/PACE/themes/blue/pace-theme-minimal.css" />
    <link rel="stylesheet" href="vendors/perfect-scrollbar/css/perfect-scrollbar.min.css" />


    <!-- page plugins css -->
    <link rel="stylesheet" href="vendors/selectize/dist/css/selectize.default.css" />
    <link rel="stylesheet" href="vendors/bower-jvectormap/jquery-jvectormap-1.2.2.css" />
    <link rel="stylesheet" href="vendors/nvd3/build/nv.d3.min.css" />


    <!-- core css -->
    <link href="css/ei-icon.css" rel="stylesheet">
    <link href="css/themify-icons.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">


    <script src=" vendors/jquery/dist/jquery.min.js"></script>

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


  <!-- Page Wrapper -->
  <div id="wrapper" class="app">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="layout">
      @include('layouts.sidebar')
       <!-- Page Container START -->
       <div class="page-container">
         <!-- Page Container START -->
         @include('layouts.topBar') 


         @yield('content')


         <!-- Footer START -->
         <footer class="content-footer">
              <div class="footer">
                  <div class="copyright">
                      <span>Copyright © 2017 <b class="text-dark">Theme_Nate</b>. All rights reserved.</span>
                      <span class="go-right">
            <a href="" class="text-gray mrg-right-15">Term &amp; Conditions</a>
            <a href="" class="text-gray">Privacy &amp; Policy</a>
          </span>
                  </div>
              </div>
          </footer>
          <!-- Footer END -->




      </div>
      
      
      

    </div>
    <!-- End of Content Wrapper -->

  </div>
<input type="hidden" id="ruta" value="<?= url('/') ?>">
 




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




<!-- build:js assets/js/vendor.js -->
    <!-- plugins js -->
    
    <script src=" vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src=" vendors/bootstrap/dist/js/bootstrap.js"></script>
    <script src=" vendors/PACE/pace.min.js"></script>
    <script src=" vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <!-- endbuild -->


      <!-- page plugins js -->
      <script src="vendors/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="js/maps/jquery-jvectormap-us-aea.js"></script>
      <script src="vendors/d3/d3.min.js"></script>
      <script src="vendors/nvd3/build/nv.d3.min.js"></script>
      <script src="vendors/jquery.sparkline/index.js"></script>
      <script src="vendors/chart.js/dist/Chart.min.js"></script>
      <script src="vendors/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
      <script src="vendors/selectize/dist/js/standalone/selectize.min.js"></script>


    <!-- build:js   js/app.min.js -->
    <!-- core js -->
    <script src=" js/app.js"></script>
    <!-- endbuild -->


    <!-- page js -->
    <script src="js/dashboard/dashboard.js"></script>
  <script src="js/funciones.js"></script>
  

  <script>
    var user_id = localStorage.getItem('user_id');
    $("#logout").attr("href", "logout/"+user_id)
  </script>


  
  @yield('CustomJs')

  

  

</body>

</html>
