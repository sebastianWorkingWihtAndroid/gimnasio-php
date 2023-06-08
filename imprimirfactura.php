

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

  <title>Imprimir Factura</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <script type="text/javascript">
    function imprSelec(historial){
  var ficha=document.getElementById(historial);
  var ventimp=window.open(' ','popimpr');
  ventimp.document.write(ficha.innerHTML);
  ventimp.document.close();
  ventimp.print();
  ventimp.close();
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

          <?php $cliente=$_SESSION['cliente'];

         $consulta =($mysqli->query("SELECT * FROM historicodepago  ORDER BY cdvalor DESC"));
         $lista=$consulta->fetch_array(MYSQLI_ASSOC);

         $consulta2 =($mysqli->query("SELECT * FROM terceros where cedula='$cliente'"));
         $lista2=$consulta2->fetch_array(MYSQLI_ASSOC);

           ?>



            <div class="col-md-2"><a  class="btn btn-primary btn-user btn-block"
             href="javascript:imprSelec('historial')">Imprimir</a></div>

            <div class="col-md-12"><br></div>

            <div class="col-md-2"></div>

           <div id="historial" align="center">
            <div class="col-md-8" align="center" >
             
              <div class="card mb-4 py-3 border-bottom-success">
                <div class="card-body">

                  <font color='#000'>

                  <h3 align="center">KASTYN</h3>
                  <font size='3px'>
                  <strong>Direccion </strong>CALLE 58 N° 24-16<br>
                  <strong>Telefono </strong>3465465<br>
                  <strong>Correo </strong>KASTYNGYM2010@HOTMAIL.COM<br>
                  <strong> </strong>BARRANQUILLA<br>
                </font>


                  <br><br>

                  <strong>RECIBO No </strong> <?php  echo $lista['cdvalor']; ?><br>
                  <strong>Fecha</strong> <?php  echo $lista['fecha']; ?><br><br>

                  <strong>Cliente</strong> <?php  echo $lista['cliente']." ".$lista2['nombres']; ?><br><br>


                  <strong>SERVICIO </strong><?php  echo $lista['dias']." Dias"; ?> <br><br>

                  <strong>Valor</strong> <?php  echo number_format($lista['valor'],0,',','.'); ?><br>
                  <strong>Descuento</strong> <?php  echo number_format($lista['descuento'],0,',','.'); ?><br>
                  <strong>Total</strong> <?php  echo number_format($lista['pagototal'],0,',','.'); ?><br><br>

                  <strong>Metodo de pago</strong> <?php  echo $lista['metodosdepago']; ?><br><br>

                  <?php if($lista['anexo']!=''){ ?>
                  <strong>Anexos:</strong> <?php  echo $lista['anexo']; ?><br><br>
                  <?php  } ?>
                  
                  <strong>Creado</strong> <?php  echo $lista['creado']; ?><br>
                  
                  <strong>Fecha Limite</strong> <?php  echo $lista['fechalimite']; ?><br><br>

                  <h4 align="center">Gracias por visitarnos </h4>

                </font>
                
                </div>
              </div>
            </div>
          </div>


          </div>

        </div>
        <!-- /.container-fluid -->

      
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include("foot.php")   ?>
      <!-- End of Footer -->
      </div>
    </div>   <!-- End of Content Wrapper -->


  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


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
