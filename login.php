
<?php 
 //llama al archivo conexion.php es el que realiza la conexion
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

  <title> .: INICIAR SESION :. </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-6" align="center"> <br> <img src="img/login.png" width="300"></div>
              <div class="col-md-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                    <h5>Debes iniciar sesion para entrar</h5>
                  </div>
                  <form  method="post">
                    <div class="form-group">
                      <input type="text" name="usuario" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Digite Usuario...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="clave" class="form-control form-control-user" id="exampleInputPassword" placeholder="Digite Contraseña">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-user btn-block" value="Enviar" name="Enviar">
                    </div>
                    
                    
                  </form>
                  
                  
                </div>
              </div>
              
              <?php 
              if(isset($_POST["Enviar"])) {
                $usuario=$_POST['usuario'];
                $clave=$_POST['clave'];

                $consulta =($mysqli->query("SELECT * FROM admin WHERE usuario='$usuario' and clave='$clave'"));

                $c1 = $consulta->num_rows;

                if ($c1!=0) {
                  //Debemos iniciar sesion y darle una variable
                  session_start();
                $_SESSION['admingym'] = $usuario; 
               
              ?>
              <!-- Redirecciona al idex.php si usuario y contraseña son correctos-->
              <script type="text/javascript">window.location="index.php";</script>
              <?php }else{ ?>
                <!-- sino redirecciona al login -->
                <script type="text/javascript">window.location="login.php";</script>
              <?php }} ?>
              


            </div>
          </div>
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
