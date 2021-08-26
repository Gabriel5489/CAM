<section class="hero is-primary is-warning"> 
<nav class="navbar" role="navigation" aria-label="main navigation">

  <div class="navbar-brand">
    
  
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
       Lista de Usuarios
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Generar
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            Reportes
          </a>
          
          <hr class="navbar-divider">
          <a class="navbar-item">
            Citas
          </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Consultar
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            Reportes
          </a>
          
          <hr class="navbar-divider">
          <a class="navbar-item">
            Citas
          </a>
        </div>
      </div>


    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
        <a href="<?php echo base_url('LoginController/salir') ?> " class="button is-info">Salir </a>
          
        </div>
      </div>
    </div>
  </div>
</nav>
    
</section>

