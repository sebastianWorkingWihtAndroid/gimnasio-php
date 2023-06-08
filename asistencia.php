

<?php 

session_start();
if (isset($_SESSION['admingym'])){
  include('conexion.php');
$hoy=date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Asistencia</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
          <h1 align="center" class="h3 mb-2 text-gray-800">Asistencia</h1>
          <p align="center" class="mb-4">Toma de asistencia</p>
          <!-- Page Heading -->
          

          

          <div class="row">
            <?php if(!isset($_POST["Asistencia"])){ ?>
              <div class="col-lg-2"></div>
            <div class="col-lg-8">

              <!-- Default Card Example -->
              <div class="card mb-4">
                <div class="card-header">
                  Informacion Basica
                </div>


                <div class="card-body">
                  
                  <form method="post">
                   
                   <label>Cliente</label>

                  <select name="cliente" class="form-control form-control-user" required>
                    <option value="">Seleccione</option>
                    <?php 
                    $contador=0;$c1=0;           
                    $consulta =($mysqli->query("SELECT * FROM asistencia WHERE dias!=0 and fechalimite>'$hoy' "));
                    while ($lista=$consulta->fetch_array(MYSQLI_ASSOC)) {
                      $contador++;
                    $cliente=$lista['cdcedula'];

                    $consulta4 =($mysqli->query("SELECT * FROM historicoasistencia where cdcedula='$cliente' and fecha='$hoy' "));
                     $c1 = $consulta4->num_rows;

                    if($c1==0){
                    $consulta2 =($mysqli->query("SELECT * FROM terceros where cedula='$cliente'"));
                    $lista2=$consulta2->fetch_array(MYSQLI_ASSOC);
                    ?>

                    
                    <option value="<?php echo $lista['cdasistencia']; ?>"><?php echo $lista2['cedula']." ".$lista2['nombres']; ?></option>
                    
                    
                  <?php } } ?>
                  </select>
                   <div class="form-group"><br><br>
                      <input type="submit" class="btn btn-success btn-user btn-block" value="Asistencia" name="Asistencia">
                    </div>
                  </form>
                </div>
              </div>

              <!-- Basic Card Example -->
            

            </div>
            <?php } 
            if (isset($_POST["Asistencia"])) {
              $cdasistencia=$_POST['cliente'];

              $consulta3 =($mysqli->query("SELECT * FROM asistencia where cdasistencia='$cdasistencia'"));
              $lista3=$consulta3->fetch_array(MYSQLI_ASSOC);

              $cedula=$lista3['cdcedula'];
              $fecha=date('Y-m-d');

              $mysqli->query("UPDATE asistencia SET dias=dias-1 WHERE cdasistencia = '$cdasistencia';");

              $mysqli->query("INSERT INTO historicoasistencia VALUES (NULL,'$cedula','$fecha');");

              $consulta5 =($mysqli->query("SELECT * FROM terceros where cedula='$cedula'"));
              $lista5=$consulta5->fetch_array(MYSQLI_ASSOC);
             ?>
             <div class="col-lg-2"></div>
            <div class="col-lg-8 col-lg-7">
              <div class="card mb-4 py-3 border-bottom-success">
                <div class="card-body">
                  <h3 align="center"><?php echo $lista5['nombres']; ?> Asistió</h3>
                </div>
              </div>
            </div>

            <script type="text/javascript">
            function redireccionarPagina() {
            window.location = "asistencia.php";
            }
            setTimeout("redireccionarPagina()", 3000);
            </script>

            <?php } ?>


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
