

<?php 
//Controla el inicio de sesion
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

  <title>Estado de Resultado</title>

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
        <div class="row">

          <?php if(!isset($_POST["Consultar"])){ ?>

            <div class="col-lg-2"></div>

           <div class="col-lg-8" align="center">

              <!-- Default Card Example -->
              <div class="card mb-8">
                <div class="card-header">
                  Informacion Basica
                </div>


                <div class="card-body">
                  
                  <form method="post">
                    <div class="row">
                    <div class="col-md-6">
                    <label>Fecha de inicio</label>
                    <input type="date" class="form-control form-control-user" name="fechai" required>
                    <br>
                </div>
                    <div class="col-md-6">
                    <label>Fecha final</label>
                    <input type="date" class="form-control form-control-user" name="fechaf" required>
                    </div>
                  </div>
                   <div class="form-group"><br><br>
                      <input type="submit" class="btn btn-success btn-user btn-block" value="Consultar" name="Consultar">
                    </div>
                  </form>
                </div>
              </div>

              <!-- Basic Card Example -->
            

            </div>

            <div class="col-lg-12"><br></div>

            <?php }
            if (isset($_POST["Consultar"])) {
              $fechai=$_POST['fechai'];
              $fechaf=$_POST['fechaf'];



              if ($fechai<$fechaf) {

                   
            // Ingresos
             $ingresos =($mysqli->query("SELECT SUM(pagototal) as total FROM historicodepago WHERE
              fecha>'$fechai' and fecha<='$fechaf'"));
             $listaingresos=$ingresos->fetch_array(MYSQLI_ASSOC);

            // Egresos
            $egresos =($mysqli->query("SELECT SUM(valor) as total FROM gastos WHERE motivo='Nomina' and fecha>'$fechai' and fecha<='$fechaf'"));
            $listaegresos=$egresos->fetch_array(MYSQLI_ASSOC);

            $egresos2 =($mysqli->query("SELECT SUM(valor) as total FROM gastos WHERE motivo='Servicios' and fecha>'$fechai' and fecha<='$fechaf'"));
            $listaegresos2=$egresos2->fetch_array(MYSQLI_ASSOC);


            $egresos3 =($mysqli->query("SELECT SUM(valor) as total FROM gastos WHERE motivo='Otros' and fecha>'$fechai' and fecha<='$fechaf'"));
            $listaegresos3=$egresos3->fetch_array(MYSQLI_ASSOC);


            $egresos4 =($mysqli->query("SELECT SUM(valor) as total FROM gastos WHERE motivo='Arriendo' and fecha>'$fechai' and fecha<='$fechaf'"));
            $listaegresos4=$egresos4->fetch_array(MYSQLI_ASSOC);

               ?>

            <div class="col-lg-2"></div>

           
            <div class="col-lg-8" align="center" >
             
              <div class="card mb-8 py-3 border-bottom-success">
                <div class="card-body">

                  <font color='#000'>

                  <h3 align="center">Informe de estado de resultado</h3>
                  <h5> <?php echo $fechai." a ".$fechaf ?> </h5><br><br>

                  <div align="left">


                  <strong>Ingresos</strong><br>
                  Sesiones <?php echo number_format($listaingresos['total'],0,',','.'); ?> <br>
                  <strong>Total ingresos </strong> <?php echo number_format($listaingresos['total'],0,',','.'); ?><br><br>

                  <strong>Egresos</strong><br>
                  Nomina <?php echo number_format($listaegresos['total'],0,',','.'); ?> <br>
                  Servicios publicos <?php echo number_format($listaegresos2['total'],0,',','.'); ?> <br>
                  Otros <?php echo number_format($listaegresos3['total'],0,',','.'); ?> <br>
                  Arriendo <?php echo number_format($listaegresos4['total'],0,',','.'); ?> <br>
                  <strong>Total egresos </strong><?php echo number_format($listaegresos['total']
                  +$listaegresos2['total']+$listaegresos3['total']+$listaegresos4['total'],0,',','.'); ?><br><br>

                  <?php $estado=$listaingresos['total'] - ( $listaegresos['total']
                  +$listaegresos2['total']+$listaegresos3['total']+$listaegresos4['total']); 



                  if($estado<=0){
                  ?>
                  <strong>Perdida </strong><?php echo $estado; ?><br>
                  <?php }else{ ?>
                  <strong>Ganancias </strong><?php echo $estado; ?><br>
                 <?php  } ?>

                 </div>

                </font>
                
                </div>
              </div>
            </div>
            <div class="col-lg-12"><br></div>
          <?php }else{ ?>

            <div class="col-lg-2"></div>
            <div class="col-lg-8 col-lg-7">
              <div class="card mb-4 py-3 border-bottom-danger">
                <div class="card-body">
                  Error, fecha de inicio es mayor que fecha final...
                </div>
              </div>
            </div>
            <div class="col-lg-12"><br></div>

            <script type="text/javascript">
            function redireccionarPagina() {
            window.location = "estadoderesultado.php";
            }
            setTimeout("redireccionarPagina()", 3000);
            </script>

          <?php  } } ?>



        

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
