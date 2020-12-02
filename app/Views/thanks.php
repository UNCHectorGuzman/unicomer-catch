<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gracias</title>

	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<style type="text/css">
		body{
			font-family: 'Roboto', sans-serif;,
			color: rgb(128, 128, 128);
		}

		.form-control{
			border: 0 none;
			border-bottom: #808080 solid 1px;
			margin-bottom: 18px;
		}
		.form-control.error{
			border-bottom: #721c24 solid 1px;
		}
		.form-control:focus{
			box-shadow: 0 0 0 0 transparent;
		}

		label.error{
			color: #721c24;
			font-size: 12px;
			position: absolute;
			bottom: -18px;
		}

		#birthday-error{
			bottom: -27px;
		}

		#gender-error{
			left: 15px;
		}
	</style>

	
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

	<figure >
		<img src="<?= base_url("public/assets/img/banner_contacto.jpg") ?>" class="img-fluid" />
	</figure>

</header>

<!-- CONTENT -->

<section>



</section>

<div class="further">

	<section>

		<div class="container-fluid">
			
			<div class="row form-group">
				<!-- <div class="col-sm-6">
					
				</div> -->
				<div class="col-sm-6 offset-sm-3">
					
					<h1>Los datos han sido guardados exitosamente</h1>

					<p>
						Para continuar ingresando registros por favor haga click en el botón regresar
					</p>

					<hr />

					<?php if( !empty($country) ): ?>
					<a href="<?= base_url("home/{$country}/{$chain}/{$branch}") ?>" class="btn btn-primary">Regresar</a>
					<?php else: ?>
					<a href="<?= base_url("home/create_case") ?>" class="btn btn-primary">Regresar</a>
					<?php endif; ?>

				</div>
			
			</div>

		</div>

	</section>

</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				Grupo Unicomer
			</div>
		</div>
	</div>
</footer>


</body>
</html>
