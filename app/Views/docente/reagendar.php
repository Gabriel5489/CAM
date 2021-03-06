<?php
$hoy = date("Y-m-d");
$hora = date("H") + 1;

if(strlen($hora) == 1){
    $hora = "0".$hora;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <a class="nav-link" aria-current="page" href="<?= base_url('docente/') ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url('docente/historial') ?>">Historial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Cerrar Sesión</a>
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
                        <h2>Reagendar Cita</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('docente/updateCita') ?>" method="post" style="margin-bottom:20px">
                        <?= csrf_field() ?>
                            <div class="form-group p-1" hidden>
                                <input type="number" name="idCita" id="idCita" value="<?= $Cita->Num_Cita ?>" >
                            </div>
                            <div class="form-group p-1">
                                <h5 name="Alumno" id="Alumno">Alumno: <?= $Cita->Nombre ?></h5>
                                <h5>Matricula: <?= $Cita->Matricula ?></h5>
                                <h5><?= $Cita->Nombre_Area ?>, Aula <?= $Cita->Aula ?></h5>
                            </div>
                            <div class="form-group p-1">
                                <label for="Fecha">Fecha de la cita</label>
                                <input type="date" class="form-control" name="Fecha" placeholder="" value="<?= isset($validation) ? set_value('Fecha') : $Cita->Fecha_Cita ?>" min="<?= $hoy ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Fecha') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="AMaterno">Hora de la cita</label>
                                <input type="time" class="form-control" name="Hora" placeholder="" min="08:00" max="17:00" value="<?= isset($validation) ? set_value('Hora') : $Cita->Hora ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Hora') : "" ?></span>
                            </div>
                            <div class="form-group p-1" style="text-align: center">
                                <button class="btn btn-primary btn-block" type="submit">Registrar</button>
                            </div>
                        </form>
                        <a href="<?= base_url('docente/') ?>"><-Regresar</a>
                    </div>
                </div>
            </div>
        </center>
        </div>
    </div>
</body>
<script>
    const id = <?= set_value('Area') ?>;
    if(id){
        const opcion = document.getElementById(id);
        opcion.setAttribute('selected','');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>