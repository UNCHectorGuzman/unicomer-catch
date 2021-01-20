<!DOCTYPE html>
<html class="h-100">
<head>
	
	<title>Inicio de sesion - UnicomerCatch</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> 
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<style type="text/css">
		body{
    		font-family: 'Ubuntu', sans-serif;
		}
	</style>

</head>
<body class="h-100">

<!-- <div class="d-flex d-column h-100"> -->
	<div class="d-flex flex-grow flex-fill h-100">
		<div class="text-white bg-dark d-flex flex-column p-3 justify-content-center w-25">
			<h2>Unicomer SCM<br> <small>Login</small> </h2>
			<p>Inicia sesión para acceder.</p>
		</div>

		 <div class="p-3 d-flex flex-column flex-grow-1 justify-content-center">
		    <div class="login-form w-75">
		       <form action="<?= base_url("auth/login") ?>" method="post">
		          <div class="form-group">
		             <!-- <label>Usuario</label> -->
		             <input type="text" class="form-control" name="user" id="user" required="required" placeholder="Usuario">
		          </div>
		          <div class="form-group">
		             <!-- <label>Clave</label> -->
		             <input type="password" class="form-control" name="password" id="password" required="required" placeholder="Clave">
		          </div>
		          <button type="submit" class="btn btn-secondary">Login</button>
		       </form>
		    </div>
		 </div>

	 </div>
<!-- </div> -->

</body>
</html>