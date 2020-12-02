<?= $this->extend('layout_default') ?>

<?= $this->section('cases') ?>

<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<h1>Casos</h1>

<div class="table-responsive">
	
<table class="table table-striped">
	<thead>

	<tr>
		<!-- <th>  </th> -->
		<th> Tipo Documento </th>
		<th> Número Documento </th>
		<th> Nombre Cliente </th>
		<th> Teléfono </th>
		<th> Número de Caso </th>
		<th> Origen del Caso </th>
		<th> Asunto </th>
		<th> Descripción </th>
		<th> Estado </th>
		<th> Comentarios internos </th>
		<th> Informacion de Cierre </th>
		<th> Fecha creación </th>
		<!-- <th> Fecha de actualización </th> -->
	</tr>
	</thead>
	<tbody>

	</tbody>
</table>

</div>

<script>

	var docTypes = <?= json_encode($documents) ?>;

	$(function(){
		$('table').DataTable({
		    "pageLength": 10,
		    "serverSide": true,
		    "processing": true,
		    // "paging": true,
		    "searchDelay": 1500,
		    "deferLoading": 0,
		    "stateSave": true,
			"ajax": {
			    "url": "<?= base_url("home/dt_cases") ?>",
			    "type": "post",
                "complete": function(response) {
                	
                    // $(this).clean().draw();
               	},
				"dataSrc": function ( json ) {
			      
					json.data.forEach(function(d, i){
						if( d[0] != null )
							d[0] = docTypes[ d[0] ];
					})

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