<?= $this->extend('layout_default') ?>

<?= $this->section('case_info') ?>

<h1>Numero de caso</h1>

<?php foreach ($info as $record) { ?>
	<h2><?= $record->CaseNumber ?></h2>

<div class="container">
	<table class="table table-striped">
		
		<tbody>

		<tr>
			<th> Tipo Documento </th>
			<td> <?= isset($doc_types[$record->tipo_documento__c]) ? $doc_types[$record->tipo_documento__c] : "" ?> </td>
		</tr>
		<tr>
			<th> Número Documento </th>
			<td> <?= $record->Numero_Documento__c ?> </td>
		</tr>
		<tr>
			<th> Nombre Cliente </th>
			<td> <?= $record->SuppliedName ?> </td>
		</tr>
		<tr>
			<th> Teléfono </th>
			<td> <?= $record->Telefono_de_Contacto__c ?> </td>
		</tr>
		<tr>
			<th> Correo </th>
			<td> <?= $record->SuppliedEmail ?> </td>
		</tr>
		<tr>
			<th> Asunto </th>
			<td> <?= $record->Subject ?> </td>
		</tr>
		<tr>
			<th> Descripción </th>
			<td> <?= $record->Description ?> </td>
		</tr>
		<tr>
			<th> Tienda de compra </th>
			<td> <?= $record->Tienda_de_Compra__c ?> </td>
		</tr>
		<tr>
			<th> Numero Factura </th>
			<td> <?= $record->Invoice__c ?> </td>
		</tr>
		<tr>
			<th> Marca </th>
			<td> <?= $record->Marca__c ?> </td>
		</tr>
		<tr>
			<th> Modelo </th>
			<td> <?= $record->Modelo__c ?> </td>
		</tr>
		<tr>
			<th> Serie </th>
			<td> <?= $record->Serie__c ?> </td>
		</tr>
		<tr>
			<th> Contrato Servicio Reparacion </th>
			<td> <?= $record->Contrato_Servicio_Reparacion__c ?> </td>
		</tr>
		<tr>
			<th> CSR </th>
			<td> <?= $record->No_CSR__c ?> </td>
		</tr>

		</tbody>
	</table>
</div>
<?php } ?>

<pre class="d-none">
<?php print_r($info) ?>
</pre>

<?= $this->endSection() ?>