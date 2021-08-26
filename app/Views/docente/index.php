<?php
include_once(ROOTPATH.'public\imagenes\translate.php');
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                <a class="nav-link active" aria-current="page" href="<?= base_url('docente/') ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url('docente/historial') ?>">Historial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('LoginController/salir') ?>">Cerrar Sesión</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container-fluid px-4">
        <div class="row text-center p-1">
            <h2>Citas pendientes</h2>
        </div>
        <div class="row text-center p-1">
            <h5>Docente: <?= $Nombre ?></h5>
        </div>
        <div class="row">
            <div class="col"><a class="btn btn-primary" href="<?= site_url('docente/cita') ?>" role="button">Añadir cita</a></div>
            <div class="col align-self-end">
                        <?php if(!empty(session()->getFlashdata('success'))) : ?>
                            <div id="toast" class="toast align-items-center text-white bg-success border-1" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                <div class="toast-body">
                                <?= session()->getFlashdata('success'); ?>
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        <?php endif ?>
            </div>
        </div>
        <div class="row" style="margin-top:5px">
        <center>
            <div class="col-mx-auto">
            <?php if($info != null){ ?>
            <table class="table table-success table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Cita</th>
                        <th scope="col">Alumno</th>
                        <th scope="col">Tutor</th>
                        <th scope="col">Fecha de la cita</th>
                        <th scope="col">Hora de la cita</th>
                        <th scope="col">Área</th>
                        <th scope="col">Aula</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($info as $row){ ?>
                    <tr>
                        <th scope="row"><?= $row->Num_Cita ?></th>
                        <td><?= $row->Nombre ?></td>
                        <td><?= $row->Tutor ?></td>
                        <?php $fecha = date("jS F, Y", strtotime($row->Fecha_Cita)) ?>
                        <td><?= traducir('en', 'es', $fecha) ?></td>
                        <td><?= $row->Hora ?></td>
                        <td><?= $row->Nombre_Area ?></td>
                        <td><?= $row->Aula ?></td>
                        <td><?= $row->Estado_Cita ?></td>
                        <td>
                            <a class="btn btn-danger" onclick="cancelar(<?= $row->Num_Cita ?>)" role="button">Cancelar</a>
                            <a class="btn btn-info" href="<?= site_url('docente/reagendar'); ?>?idCita=<?= $row->Num_Cita ?>" role="button">Reagendar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="<?= site_url('docente') ?>" tabindex="-1">Primero</a>
                    </li>
                    <?php for($i=1; $i<=$paginas; $i++){ ?>
                        <?php if($i==1){ ?>
                            <li class="page-item" id="1">
                                <a class="page-link" href="<?= site_url('docente') ?>"><?= $i ?></a>
                            </li>
                        <?php }else{ ?>
                            <li class="page-item" id="<?= $i ?>">
                                <a class="page-link" href="<?= site_url('docente') ?>?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= site_url('docente') ?>?page=<?= $paginas ?>">Ultimo</a>
                    </li>
                </ul>
            </nav>
            <?php }else{ ?>
                <p>Aún no tiene citas pendientes</p>
            <?php } ?>
            </div>
        </center>
        </div>
    </div>
</body>
<script>
    var url = "<?= site_url('docente/cancelar') ?>";
    var actual = <?= $paginaActual ?>;
    var toast = document.getElementById('toast')
    mostrarToast(toast);
    pagina(actual);
    function cancelar(id){
        if(window.confirm("¿Estás seguro de cancelar la cita número "+ id +" ?")){
            //console.log(url+ "?id=" + id);
            window.location.href = url + "?id=" + id;
        }
    }

    function mostrarToast(objeto){
        console.log(objeto);
        if (objeto) {
            var toast = new bootstrap.Toast(objeto);
            toast.show();
        }
    }

    function pagina(actual){
        console.log(actual);
        let li=null;
        if(actual == 0){
            li  = document.getElementById("1");
            console.log(li);
            li.setAttribute('aria-current', 'page');
            li.setAttribute('class', 'page-item active');
        }else{
            actual = actual / 5;
            li  = document.getElementById(actual);
            console.log(li);
            li.setAttribute('aria-current', 'page');
            li.setAttribute('class', 'page-item active');
        }
    }

</script>
</html>