<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>usuarios</title>
  </head>
  <body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  
<div class="container">
<div class="row flex-lg-nowrap">
  
  <div class="col">
    <div class="e-tabs mb-3 px-3">
      <ul class="nav nav-tabs">
        
        <li class="nav-item"><a class="nav-link active" href="<?= base_url('/admin')?>"><h4>Administrador</h></a></li>
      </ul>
    </div>

    <div class="row flex-lg-nowrap">
      <div class="col mb-3">
        <div class="e-panel card">
          <div class="card-body">
            <div class="card-title">
              <h6 class="mr-2"><span>Usuarios</span><small class="px-1"></small></h6>
            </div>
        
            <div class="e-table">
              <div class="table-responsive table-lg mt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="max-width">Matricula</th>
                      <th class="sortable">Nombr</th>
                      <th class="max-width">Apellido P</th>
                      <th class="sortable">Apellido M</th>
                      <th class="sortable">Telefono</th>
                      <th class="sortable">Correo</th>
                      <th class="sortable">Tutor</th>
                      
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-nowrap align-middle"></td>
                      <td class="text-nowrap align-middle"><span></span></td>
                      <td class="text-nowrap align-middle"></td>
                      <td class="text-nowrap align-middle"><span></span></td>
                      <td class="text-nowrap align-middle"></td>
                      <td class="text-nowrap align-middle"><span></span></td>
                      <td class="text-nowrap align-middle"><span></span></td>
                      
                      <td class="text-center align-middle">
                        <div class="btn-group align-top">
                            <button class="btn btn-sm btn-outline-secondary badge" type="button" data-toggle="modal" data-target="#user-form-modal">Editar</button>
                            <button class="btn btn-sm btn-outline-secondary badge" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="d-flex justify-content-center">
                <ul class="pagination mt-3 mb-0">
                  <li class="disabled page-item"><a href="#" class="page-link">‹</a></li>
                  <li class="active page-item"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item"><a href="#" class="page-link">3</a></li>
                  <li class="page-item"><a href="#" class="page-link">4</a></li>
                  <li class="page-item"><a href="#" class="page-link">5</a></li>
                  <li class="page-item"><a href="#" class="page-link">›</a></li>
                  <li class="page-item"><a href="#" class="page-link">»</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-3 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="text-center px-xl-3">
              <button class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#user-form-modal">Nuevo usuario</button>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nuevo Usuario</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-1">

              <form class="form" novalidate="">
                <div class="row">
                  <div class="col">

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Matricula</label>
                          <input class="form-control" type="text" name="name" placeholder="Matricula" >
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label>Nombres</label>
                          <input class="form-control" type="text" name="username" placeholder="Nombre" >
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label>Apellido P</label>
                          <input class="form-control" type="text" name="username" placeholder="Apellido Paterno" >
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Apellido M</label>
                          <input class="form-control" type="text" name="name" placeholder="Apellido Materno" >
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label>Telefono</label>
                          <input class="form-control" type="text" name="username" placeholder="Numero de Telefono" >
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label>Correo</label>
                          <input class="form-control" type="email" name="username" placeholder="Correo electronico">
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Tutor</label>
                          <input class="form-control" type="text" name="name" placeholder="Nombre del Tutor">
                        </div>
                      </div>

                    </div>

                  </div>
                </div>
                
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>