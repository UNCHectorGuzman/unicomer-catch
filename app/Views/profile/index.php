<?= $this->extend('layout_default') ?>

<?= $this->section('profile') ?>

<div class="container">
	<h3>Cambia tu contraseña</h3>
	
	<div class="row">
		<div class="col-sm-12">
			<form action="<?= base_url("profile") ?>" method="post">
				
				<div class="form-group row">
					<label for="" class="col-sm-4">
						Clave
					</label>
					<div class="col-sm-8">
						<input type="password" maxlength="16" class="form-control" placeholder="Clave" name="password" id="password" minlength="8" required="required">
					</div>
				</div>				

				<div class="form-group row">
					
					<div class="offset-sm-4 col-sm-8">
						<input type="submit" value="Enviar" class="btn btn-primary">
					</div>
				</div>

			</form>
		</div>
	</div>
</div>


<?= $this->endSection() ?>