<?php
require_once 'classes/Header.php';
require_once 'classes/Footer.php';

$Header = new Header(array('css/login.css'), array('css'));
$Header->headerBasico();
?>

<body style="margin: 5 5; width: 100%">
  <div class="formulario">
    <div class="tabs row">
      <div class="col-sm d-flex justify-content-center">
        <span class="btn btn-primary" id="login">Login</span>
      </div>
      <div class="col-sm d-flex justify-content-center">
        <span class="btn btn-outline-primary" id="registro">Registrarse</span>
      </div>
    </div>
    <div class="logo">
      <img src="img/logo.svg" alt="" srcset="">
    </div>
    <div id="form_login">
      <form action="" method="post" id="login_form">
        <div class="mb-3">
          <label for="email" class="form-label">Correo electrónico/Username</label>
          <input type="text" class="form-control" id="email" aria-describedby="email" placeholder="">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="">
        </div>
        <div class="mb-3">
          <input type="checkbox" name="recordar" id="recordar"> <label for="recordar" class="form-label">Recordar usuario</label>
        </div>
        <span class="btn btn-primary" id="loguearse">Login</span>
      </form>
    </div>
    <div id="form_registrarse" class="ocultar">
      <form action="" method="post">
        <div class="mb-3">
          <label for="email_registrarse" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="email_registrarse" aria-describedby="email" placeholder="">
        </div>
        <div class="mb-3">
          <label for="username_registrarse" class="form-label">Username</label>
          <input type="text" class="form-control" id="username_registrarse" aria-describedby="username" placeholder="">
        </div>
        <div class="mb-3">
          <label for="dni_registrarse" class="form-label">DNI/NIF</label>
          <input type="text" class="form-control" id="dni_registrarse" aria-describedby="dni" placeholder="">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password_registrarse" aria-describedby="password" placeholder="">
        </div>
        <span class="btn btn-primary" id="registrarse">Registrarse</span>
      </form>
    </div>
  </div>
</body>
<?php
$Footer = new Footer();
$Footer->footer();
?>
<script src="js/login.js"></script>