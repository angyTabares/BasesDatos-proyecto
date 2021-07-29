<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css">
   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<!------ Include the above in your HEAD tag ---------->

<body>
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg  nav fixed-top">
    <div class="container">
      <a class="navbar-brand logoNav" href="../../aplicacion.php">
      <img src="./imagenes/logoNoBg.svg" alt=""class="logo d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          
        
        </ul>
      </div>
    </div>
  </nav>



<div class="mt-5" id="login">
  <h3 class="text-center text-white pt-5">Login form</h3>
  <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
          <div id="login-column" class="col-md-6">
              <div id="login-box" class="col-md-12">
                  <form id="login-form" class="form" action="validar.php" method="post">
                      <h3 class="text-center loginHeader">Login</h3>
                      <div class="form-group">
                          <label for="username" class="">Correo:</label><br>
                          <input type="text" name="username" id="username" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="password" class="">Contraseña:</label><br>
                          <input type="password" name="password" id="password" class="form-control">
                      </div>
                      <div class="form-group">
                          <input type="submit" name="submit" class="btn btnForm  btn-md" value="Ingresar">
                      </div>
                      <div id="register-link" class="text-right ">
                          <a href="empleados/vistas/registrarEmpleado.php" class="text-info">Registrarse</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
</body>

</html>