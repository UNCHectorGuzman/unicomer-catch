<?= $this->extend('layout_default') ?>

<?= $this->section('create_case') ?>

<!-- HEADER: MENU + HEROE SECTION -->
<!-- <header>

	<figure >
		<img src="<?= base_url("public/assets/img/banner_contacto.jpg") ?>" class="img-fluid" />
	</figure>

</header> -->

<!-- CONTENT -->

<!-- <section>



</section> -->

<div class="further mt-5">

	<section>

		<div class="container-fluid">
			
			<div class="row form-group">
				<!-- <div class="col-sm-6">
					
				</div> -->
				<div class="col-sm-6 offset-sm-3">
					<form action="<?= base_url("home/save") ?>" method="POST">

						<fieldset class="form-group border p-4">
							<legend class="w-auto">
								Detalle de caso
							</legend>
							<div class="row form-group">
								<label class="col-sm-4">
									Tipo Documento
								</label>
								<div class="col-sm-8">
									
									<select class="form-control" name="document_type" id="document_type" required="required">
										<option value="">Seleccione</option>									
										<?php foreach ($document_types as $type) : ?>
											<option value="<?= $type["code"] ?>"><?= $type["name"] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Número Documento
								</label>
								<div class="col-sm-8">
									<input type="text" name="document_id" id="document_id" class="form-control" required />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Nombre Cliente
								</label>
								<div class="col-sm-8">
									<input type="text" name="name" id="name" class="form-control" required>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Teléfono
								</label>
								<div class="col-sm-8">
									<input type="number" name="phone" id="phone" class="form-control" required min="0" />
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
							<!-- todo: take it from users session -->
							<!-- <div class="row form-group">
								<label class="col-sm-4">
									Cadena
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="chain" id="chain">
										
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Tienda
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="branch" id="branch">
										
									</select>
								</div>
							</div> -->
							<div class="row form-group">
								<label class="col-sm-4">
									Tipo de Caso
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="case_type" id="case_type" required="required">
										<option value="">Seleccione</option>
										<?php foreach ($case_types as $type) : ?>
											<option value="<?= $type["id"] ?>"><?= $type["name"] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Motivo de Caso
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="case_reason" id="case_reason" required="required">
										<option value=''>Seleccione tipo de caso</option>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Prioridad
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="priority" id="priority">
										<option value="">Seleccione</option>									
										<?php foreach ($case_priorities as $priority) : ?>
											<option value="<?= $priority["id"] ?>"><?= $priority["label"] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Origen de reclamo
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="claims_origin" id="claims_origin">
										<option value="">Seleccione</option>									
										<?php foreach ($claims_origins as $claim) : ?>
											<option value="<?= $claim["id"] ?>"><?= $claim["label"] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Asunto
								</label>
								<div class="col-sm-8">
									<input type="text" name="case_subject" id="case_subject" class="form-control" required maxlength="50" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Descripción del caso
								</label>
								<div class="col-sm-8">
									<textarea name="case_description" id="case_description" class="form-control" required maxlength="255" ></textarea>
								</div>
							</div>
						</fieldset>

						<fieldset class="form-group border p-4">
							<legend class="w-auto">
								Detalle de compra
							</legend>
							
							<div class="row form-group">
								<label class="col-sm-4">
									Tienda de compra
								</label>
								<div class="col-sm-8">
									<select name="shop_store" id="shop_store" class="form-control" />
										<option value="">Seleccione</option>									
										<?php foreach ($branches as $branch) : ?>
											<option value="<?= $branch["name"] ?>"><?= $branch["name"] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Fecha compra
								</label>
								<div class="col-sm-8">
									<div class="input-group date" data-provide="datepicker" data-date-end-date="<?= date("d/m/Y +1 day") ?>" data-date-format="dd/mm/yyyy">
									    <input type="text" class="form-control" name="shop_date" id="birthday" readonly value="" />
									    <div class="input-group-addon">
									        <span class="glyphicon glyphicon-th"></span>
									    </div>
									</div>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Descripción del articulo
								</label>
								<div class="col-sm-8">
									<textarea name="item_description" id="item_description" class="form-control" maxlength="100" ></textarea>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Marca
								</label>
								<div class="col-sm-8">
									<input type="text" name="brand" id="brand" class="form-control" maxlength="100" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Modelo
								</label>
								<div class="col-sm-8">
									<input type="text" name="model" id="model" class="form-control" maxlength="50" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Serie
								</label>
								<div class="col-sm-8">
									<input type="text" name="serie" id="serie" class="form-control" maxlength="50" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									No. Factura
								</label>
								<div class="col-sm-8">
									<input type="text" name="invoice" id="invoice" class="form-control" maxlength="50" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Tipo de compra
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="shop_type" id="shop_type">
										<option value="">Seleccione</option>									
										<?php foreach ($shop_types as $shop_type) : ?>
											<option value="<?= $shop_type["id"] ?>"><?= $shop_type["name"] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Precio
								</label>
								<div class="col-sm-8">
									<input type="text" name="price" id="price" class="form-control" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Pagaré
								</label>
								<div class="col-sm-8">
									<input type="text" name="promissory_note" id="promissory_note" class="form-control" maxlength="50" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Garantia Proveedor
								</label>
								<div class="col-sm-8">
									<input type="number" name="warranty_provider" id="warranty_provider" class="form-control" min="0" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Estado Garantía Proveedor
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="warranty_status_provider" id="warranty_status_provider">
										<option value="">Seleccione</option>									
										<option value="1">Activa</option>
										<option value="2">Vencido</option>
									</select>
								</div>
							</div>						
							<div class="row form-group">
								<label class="col-sm-4">
									Contrato de servicio de reparación
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="repair_service_contract_type" id="repair_service_contract_type">
										<option value="">Seleccione</option>									
										<?php foreach ($contract_types as $contract_type) : ?>
											<option value="<?= $contract_type["id"] ?>"><?= $contract_type["label"] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									No. Csr
								</label>
								<div class="col-sm-8">
									<input type="text" name="repair_service_contract" id="repair_service_contract" class="form-control" maxlength="50" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Garantía Contrato
								</label>
								<div class="col-sm-8">
									<input type="number" name="warranty_contract" id="warranty_contract" class="form-control" min="0" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Estado Garantía
								</label>
								<div class="col-sm-8">
									<select class="form-control" name="warranty_status" id="warranty_status">
										<option value="">Seleccione</option>									
										<option value="1">Activa</option>
										<option value="2">Vencido</option>
									</select>
								</div>
							</div>
						</fieldset>
						<!-- <div class="row form-group">
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
						</div> -->
						<!-- <div class="row form-group">
							<label class="col-sm-8">
								<input type="checkbox" name="00NE00000059nV2" id="newsletter" value="S" class="checkbox">
								Recibir noticias
							</label>
						</div> -->
						<div class="row form-group">
							<div class="col-sm-12">
								<input value="Enviar" type="submit" name="submit" id="submit" class="btn btn-primary">
							</div>
						</div>

						<input type="hidden" value="Web-Tiendas" name="case_origin" id="case_origin" />
						<input type="hidden" value="<?= session("chain") ?>" name="chain" id="chain" />
						<input type="hidden" value="<?= session("branch") ?>" name="branch" id="branch" />

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
		return this.optional( element ) || /^[2|6|7][0-9]{7}$/.test( value );
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

	$('.date').datepicker({
	    language: 'es'
	});

	$(function(){
		$("#case_type").on("change", function(){
			var type = $(this).val();

			if( type == '' ){
				$("#case_reason").html("<option value=''>Seleccione tipo de caso</option>");
				return false;
			}

			$("#case_reason").html("<option value=''>Seleccione</option>");

			$.get("<?= base_url("home/reasons") ?>/" + type, function(resp){
				resp.forEach(function(el, i){
					$("#case_reason").append("<option value=" + el.id + ">" + el.name + "</option>")
				});
			});
		});


		$("form").validate({
			rules:{
				document_id: { document_id: true },
				celphone: { phone: true },
				email: {email: true},
				price: {number: true}
			},
			messages: {
			    price: {
			        number: "Ingrese el valor en números con decimales"
			    }
			}
		});

		$.validator.addMethod("document_id", function( value, element ) {
			if( $("#document_type").val() == 1 ){
				return this.optional( element ) || /^[0-9]{9}$/.test( value );
			} else if( $("#document_type").val() == 2 || $("#document_type").val() == 4 ){
				return this.optional( element ) || /^[0-9]{4}\-[0-9]{6}\-[0-9]{3}\-[0-9]{1}$/.test( value );
			}

			return this.optional( element );

		}, "El formato es inválido");

	});


</script>

<?= $this->endSection() ?>
