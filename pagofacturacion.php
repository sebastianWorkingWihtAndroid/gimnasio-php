

<?php 

session_start();
if (isset($_SESSION['admingym'])){
  include('conexion.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Facturacion</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript">

    function sumar(){
      var valor=document.getElementById('valor').value;
      var descuento=document.getElementById('descuento').value;

      var resta=(parseInt(valor)-parseInt(descuento));

      document.getElementById('total').value=resta;

    }
  </script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <?php include("header.php")   ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 align="center" class="h3 mb-2 text-gray-800">Nueva Facturacion</h1>
          <p align="center" class="mb-4">Facturacion</p>


          <?php $cliente=$_SESSION['cliente'];

         $consulta =($mysqli->query("SELECT * FROM terceros where cedula='$cliente'"));
         $lista=$consulta->fetch_array(MYSQLI_ASSOC);

           ?>
          <!-- Page Heading -->

          <div class="row">
            <?php if(!isset($_POST["Agregar"])){ ?>
              <div class="col-lg-2"></div>
            <div class="col-lg-8">

              <!-- Default Card Example -->
              <div class="card mb-4">
                <div class="card-header">
                  <h3>Facturacion a <strong>
                  <?php 
                  echo $lista['nombres'];
                  ?>
                  </strong>
                  </h3>
                </div>

                <?php 
                $dias=0;
                $valor=0;
                $dias=$_SESSION['tiempo'];
                if ($dias==30) {

                $consulta2 =($mysqli->query("SELECT * FROM valores where dias=30"));
                $lista2=$consulta2->fetch_array(MYSQLI_ASSOC);
                $valor=$lista2['valor'];
                }else{
                $consulta3 =($mysqli->query("SELECT * FROM valores where dias=1"));
                $lista3=$consulta3->fetch_array(MYSQLI_ASSOC);
                $valor=$lista3['valor'];
                $valor=$dias*$valor;
                }

                ?>


                <div class="card-body">
                  
                  <form method="post">   
                  <div class="row">              
                    <div class="col-lg-6">
                  <label>Valor</label>
                  <br>
                  <input type="number" disabled="true" id="valor" value="<?php echo $valor; ?>"  class="form-control form-control-user"  placeholder="Digite el valor...">
                </div>

                  <input type="hidden" value="<?php echo $valor; ?>" name="valor" class="form-control form-control-user"  >
                  <br>
                  <div class="col-lg-6">
                  <label>Descuento</label>
                  <br>
                  <input type="number" onkeyup="sumar();" name="descuento" id="descuento" class="form-control form-control-user" required  placeholder="Digite el valor..."><br>
                </div>
                  <label>Pago total</label>
                  <br>
                  <input type="number" disabled="true" name="total" id="total" class="form-control form-control-user" required  placeholder="Digite el valor..."><br>

                

                    <label>Metodos de pago</label>

                  <select name="metododepago" class="form-control form-control-user" required>
                    <option value="">Seleccione</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
                    
                  </select>

                  <label>Anexo</label>
                  <br>
                  <input type="text" name="anexo" class="form-control form-control-user"  placeholder="Describa un anexo..." ><br>

                   <div class="form-group"><br><br>
                      <input type="submit" class="btn btn-success btn-user btn-block" value="Agregar" name="Agregar">
                    </div>
                  </form>
                </div>
              </div>

              <!-- Basic Card Example -->
            

            </div>
            <?php }
            if (isset($_POST["valor"])) {

              $valor=$_POST['valor'];
              $descuento=$_POST['descuento'];
              $metododepago=$_POST['metododepago'];
              $anexo=$_POST['anexo'];
              $creado=$_SESSION['admingym'];
              $fecha=date('Y-m-d');
              $fechalimite = strtotime('+30 days', strtotime($fecha) );
              $fechalimite = date('Y-m-d',$fechalimite);
              $dias=$_SESSION['tiempo'];
              $cliente=$_SESSION['cliente'];
              $pagototal=$valor-$descuento;


              $mysqli->query("INSERT INTO historicodepago VALUES (NULL,'$cliente','$dias
                ','$valor','$descuento','$pagototal','$metododepago','$anexo','$creado','$fecha','$fechalimite');");

              $mysqli->query("INSERT INTO asistencia VALUES (NULL,'$cliente
                ','$dias','$fechalimite','activo');");

              ?>
              <script type="text/javascript">window.location="imprimirfactura.php";</script>

            <?php }

             ?>


          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
       <?php include("foot.php")   ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php 

}else{
  header("location: login.php");
}

?>
