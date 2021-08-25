<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<style>
    .form-group{
        text-align:left;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">      
       <a class="navbar-brand" href="#">
          <img src="<?= base_url('imagenes/Logo.png') ?>" alt="" width="80" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url('auth')?>">Registrarse</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('login')?>">Iniciar Sesión</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <div class="container my-auto p-4">
        <div class="row" style="margin-top:5px">
        <center>
          <div class="col-mx-4 mx-5">
            <div class="card text-center" style="width:24rem">
            <div class="card-header">
              <h2>Iniciar Sesión</h2>
            </div>
            <div class="card-body">
            <form action="<?= base_url('LoginController/entrar')?>" method="POST"  >
              <?= csrf_field() ?>
              <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
              <?php endif ?>
              <?php if(!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
              <?php endif ?>

            <div class="field">
              <label for="Usuario">Usuario</label>
              <p class="control has-icons-left has-icons-right">
                <input class="input" name="Usuario" type="text" placeholder="Ingrese el Usuario">
                <span class="icon is-small is-left"><i class="fas fa-user-tie"></i></span>
                <span class="icon is-small is-right"><i class="fas fa-check"></i></span>
              </p>
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Usuario') : "" ?></span>
            </div><br>
            <div class="field">
              <label for="Contraseña">Contraseña</label>
              <p class="control has-icons-left has-icons-right">
                <input class="input"  name="Contraseña" type="password" placeholder="Ingrese la contraseña">
                <span class="icon is-small is-left"><i class="fas fa-lock"></i> </span>
                <span class="icon is-small is-right"><i class="fas fa-check"></i></span>
              </p>
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Contraseña') : "" ?></span>
            </div>
          </div>
          <div class="field">
            <p class="control">
              <button class="button is-info" type="submit"> Entrar </button>
          </div>
          <a href="<?php echo base_url('auth/')?>">No tengo cuenta</a>
        </form>
      </div>
    </div>
  </div>
</center>
</div>
</div>
</body>
<footer class="text-center text-lg-start bg-light text-muted">
  <br>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:<a class="text-reset fw-bold" href="#">Centro de atencion multiple </a>
  </div>
  
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</html>