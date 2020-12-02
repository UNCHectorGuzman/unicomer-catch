<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prospectos Nicaragua</title>

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
					<form action="https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">


						<div class="row form-group">
							<label class="col-sm-4">
								Nombre
							</label>
							<div class="col-sm-8">
								<input type="text" name="first_name" id="name" class="form-control" required />
							</div>
						</div>
						<div class="row form-group">
							<label class="col-sm-4">
								Apellidos
							</label>
							<div class="col-sm-8">
								<input type="text" name="last_name" id="last_name" class="form-control" required>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-sm-4">
								No de identificación
							</label>
							<div class="col-sm-8">
								<input type="text" name="00NE00000059UAF" id="document_id" class="form-control" required />
							</div>
						</div>
						<div class="row form-group">
							<label class="col-sm-4">
								Género
							</label>
							<div class="col-sm-8">
								<label>
									<input type="radio" name="00NE00000059UA5" id="male" value="M" class="radio" required /> M
								</label>
								
								<label>
									<input type="radio" name="00NE00000059UA5" id="female" value="F" class="radio" required /> F
								</label>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-sm-4">
								Fecha de nacimiento
							</label>
							<div class="col-sm-8">
								<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
								    <input type="text" class="form-control" name="00NE00000059UA0" id="birthday" required readonly />
								    <div class="input-group-addon">
								        <span class="glyphicon glyphicon-th"></span>
								    </div>
								</div>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-sm-4">
								Correo electrónico
							</label>
							<div class="col-sm-8">
								<input type="email" name="email" id="email" class="form-control" required />
							</div>
						</div>
						<div class="row form-group">
							<label class="col-sm-4">
								Teléfono celular
							</label>
							<div class="col-sm-8">
								<input type="text" name="mobile" id="celphone" class="form-control" required />
							</div>
						</div>
						<div class="row form-group">
							<label class="col-sm-8">
								<input type="checkbox" name="00NE00000059nV2" id="newsletter" value="S" class="checkbox">
								Recibir noticias
							</label>
						</div>
						<div class="row form-group">
							<div class="col-sm-12">
								<input value="Enviar" type="submit" name="submit" id="submit" class="btn btn-primary">
							</div>
						</div>
						<input type="hidden" name="oid" value="00D6C0000000ta4">
						<input type="hidden" name="lead_source" id="lead_source" value="Web">
						<input type="hidden" name="retURL" value="https://unicomerlead.herokuapp.com/graciastropi/">
						<input type="hidden" name="00NE00000059U9g" id="country" value="<?= $country ?>">
						<input type="hidden" name="00NE00000059nU4" id="00NE00000059nU4" value="<?= $chain ?>">
						<input type="hidden" name="00NE00000059U9q" id="00NE00000059U9q" value="<?= $branch ?>">
						<input type="hidden" name="recordType" id="recordType" value="01244000000DHTAAA4">

					</form>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<script type="text/javascript">

	$.validator.addMethod("phone", function( value, element ) {
		return this.optional( element ) || /^[5|6|7|8|9][0-9]{7}$/.test( value );
	}, "El formato es inválido");

	$.validator.addMethod("document_id", function( value, element ) {
		return this.optional( element ) || /^[0-9]{13}[A-Z]{1}$/.test( value );
	}, "El formato es inválido");


	/*
	 * Translated default messages for the jQuery validation plugin.
	 * Locale: ES
	 */
	 
	jQuery.extend(jQuery.validator.messages, {
		required: "Este campo es obligatorio.",
		remote: "Por favor, rellena este campo.",
		email: "Por favor, escribe una dirección de correo válida",
		url: "Por favor, escribe una URL válida.",
		date: "Por favor, escribe una fecha válida.",
		dateISO: "Por favor, escribe una fecha (ISO) válida.",
		number: "Por favor, escribe un número entero válido.",
		digits: "Por favor, escribe sólo dígitos.",
		creditcard: "Por favor, escribe un número de tarjeta válido.",
		equalTo: "Por favor, escribe el mismo valor de nuevo.",
		accept: "Por favor, escribe un valor con una extensión aceptada.",
		maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
		minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
		rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
		range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
		max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
		min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
	});

	$("form").validate({
		rules:{
			document_id: { document_id: true },
			celphone: { phone: true }
		}
	});

	$('.date').datepicker({
	    language: 'es'
	});


</script>

</body>
</html>
