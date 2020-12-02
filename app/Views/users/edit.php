<?= $this->extend('layout_default') ?>

<?= $this->section('users_edit') ?>
<div class="further mt-5">

	<section>

		<div class="container-fluid">
			
			<div class="row form-group">

				<div class="col-sm-6 offset-sm-3">
					<form action="<?= base_url("users/save/{$user["id"]}") ?>" method="POST">

						<fieldset class="form-group border p-4">
							<legend class="w-auto">
								<?= $user["id"] ? "Editar" : "Crear" ?>
								usuario
							</legend>

							<div class="row form-group">
								<label class="col-sm-4">
									Nombre de usuario
								</label>
								<div class="col-sm-8">
									<input type="text" name="username" id="username" class="form-control" required value="<?= $user["username"] ?>" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Clave
								</label>
								<div class="col-sm-8">
									<input type="password" name="password" id="password" class="form-control" required value="" minlength="8" maxlength="16" placeholder="*****" />
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Cadena
								</label>
								<div class="col-sm-8">
									<select class="form-control" id="chain" name="chain">
										<option value="">Seleccione</option>
										<?php foreach ($chains as $chain) { ?>
											<option value="<?= "{$chain["id"]}" ?>" <?= set_select("chain", $chain["id"], $chain["id"] == $user["chain_id"]) ?> ><?= $chain["name"] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Sucursal
								</label>
								<div class="col-sm-8">
									<select class="form-control" id="branch" name="branch">
										<option value="">Seleccione</option>
										<?php foreach ($branches as $branch) { ?>
											<option value="<?= "{$branch["id"]}" ?>" <?= set_select("branch", $branch["id"], $branch["id"] == $user["branch_id"]) ?> ><?= $branch["name"] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-sm-4">
									Rol
								</label>
								<div class="col-sm-8">
									<select class="form-control" id="role" name="role">
										<option value="">Seleccione</option>
										<?php foreach ($roles as $role) { ?>
											<option value="<?= "{$role["id"]}" ?>" <?= set_select("role", $role["id"], $role["id"] == $user["role_id"]) ?> ><?= $role["name"] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

						</fieldset>

						<div class="row form-group">
							<div class="col-sm-12">
								<input value="Enviar" type="submit" name="submit" id="submit" class="btn btn-primary">
							</div>
						</div>

						<input type="hidden" name="branch_name" id="branch_name">
						<input type="hidden" name="chain_name" id="chain_name">

					</form>
				</div>
			
			</div>

		</div>

	</section>

</div>

<pre>
	<?php //print_r( $user ); ?>
</pre>

<script type="text/javascript">
	
	$(function(){

		$("#chain").on("change", function(){
			var type = $(this).val();

			$("#chain_name").val( $("#chain option:selected").text() );

			if( type == '' ){
				$("#branch").html("<option value=''>Seleccione Cadena</option>");
				return false;
			}

			$("#branch").html("<option value=''>Seleccione</option>");

			$.get("<?= base_url("branches/list") ?>/" + type, function(resp){
				resp.forEach(function(el, i){
					$("#branch").append("<option value=" + el.id + ">" + el.name + "</option>")
				});
			});
		});

		$("#branch").on("change", function(){
			$("#branch_name").val( $("#branch option:selected").text() );
		});
	})

</script>

<?= $this->endSection() ?>