<!DOCTYPE html>
<html class="h-100">
<head>
	
	<title>Unicomer SCM</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> 
	<link href="<?= base_url("public/assets/css/site.css") ?>" rel="stylesheet"> 
	
	<script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<style type="text/css">
		body{
    		font-family: 'Ubuntu', sans-serif;
		}
	</style>

</head>
<body class="h-100">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Unicomer SCM</a><br />

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Perfil <?= session("username") ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url("profile") ?>"> Cambiar clave </a>
          <!-- <div class="dropdown-divider"></div> -->
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="casesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Casos
        </a>
        <div class="dropdown-menu" aria-labelledby="casesDropdown">
          <a class="dropdown-item" href="<?= base_url("home/cases") ?>">Buscar</a>
          <a class="dropdown-item" href="<?= base_url("home/create_case") ?>">Nuevo</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url("users") ?>">Usuarios</a>
      </li>
    </ul>
    <a href="<?= base_url("auth/logout") ?>" class="text-danger">Salir</a>
  </div>
</nav>
<!-- <div class="d-flex d-column h-100"> -->
	<div class="container-fluid">
		<?= $this->renderSection($section) ?>
	</div>
<!-- </div> -->

</body>
</html>