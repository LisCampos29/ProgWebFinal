<?php
class EncabezadoExterno
{
  function template($tituloPagina)
  {
    ?>
    <!doctype html>
    <html lang = "es">

    <head>
      <title><?php echo $tituloPagina; ?></title>
    <meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <BODY>
    <nav class="navbar navbar-light" style="background-color: #bde0fe;">
    <div class="container-fluid">
<a class="navbar-brand" href="#">
  <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
  Escuela
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="?modulo=Inicio&controlador=Inicio&accion=index">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="?modulo=Crud&controlador=Crud&accion=index">Crud</a>
      </li>
      
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
  </div>
</div>
</div>
</nav>
    </BODY>
</HTML>
<?php

}


}
?>
