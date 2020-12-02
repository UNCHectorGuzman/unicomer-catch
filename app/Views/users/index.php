<?= $this->extend('layout_default') ?>

<?= $this->section('users_list') ?>

<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<h1>Usuarios</h1>
<a href="<?= base_url("users/edit") ?>" class="btn btn-primary">Agregar</a>
<div class="table-responsive mt-5">
	
<table class="table table-striped">
	<thead>

	<tr>
		<!-- <th>  </th> -->
		<th> Nombre de usuario </th>
		<th> Cadena </th>
		<th> Sucursal </th>
		<th>  </th>
	</tr>
	</thead>
	<tbody>

	</tbody>
</table>

</div>

<script>

	$(function(){
		$('table').DataTable({
		    "pageLength": 10,
		    "serverSide": true,
		    "processing": true,
		    // "paging": true,
		    "searchDelay": 1500,
		    // "deferLoading": 10,
		    "searching": false,
		    "ordering": false,
		    "stateSave": true,
			"ajax": {
			    "url": "<?= base_url("users/dt_users") ?>",
			    "type": "post",
                "complete": function(response) {
                	
                    // $(this).clean().draw();
               	},
				"dataSrc": function ( json ) {
			      
			      return json.data;

			    }
			},
			"language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            }
		});
	})
</script>

<?= $this->endSection() ?>