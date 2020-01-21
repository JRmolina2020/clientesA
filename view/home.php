<?php
require 'header.php';
?>

<div class="row">
	<div class="col-lg-8">
		<div class="panel-body table-responsive" id="listado">
			<table id="list" class="table table-striped table-bordered">
				<thead class="thead-primary">
					<th></th>
					<th>Empresa</th>
					<th>Nombre</th>
					<th>T-Persona</th>
					<th>Regimen</th>
					<th>Iva</th>
					<th>T.identi</th>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-lg-4 mt-5">
		<form method="POST" id="formu" name="formu">
			<input type="hidden" id="id" name="id">
			<div class="form-group">
				<label for="">Cliente</label>
				<input type="text" class="form-control" name="nombre" id="nombre" disabled placeholder="nombre cliente">
			</div>
			<div class="form-group">
				<label for="">Empresa</label>
				<input type="text" class="form-control" name="empresa" id="empresa" disabled placeholder="nombre empresa">
			</div>
			<div class="form-group">
				<label for="">Tipo de persona</label>
				<select class="form-control" name="tipo" id="tipo" require>
					<option value="1">Juridica</option>
					<option value="2">Natural</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Tipo de regimen</label>
				<select class="form-control" name="regimen" id="regimen" require>
					<option value="48">Impuesto sobre las ventas – IVA </option>
					<option value="49">No responsable de IVA </option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Es responsable del iva?</label>
				<select class="form-control" name="iva" id="iva" require>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Tipo de identificacion</label>
				<select class="form-control" name="tipo_identi" id="tipo_identi" require>
					<option value="13">Cedula</option>
					<option value="31">NIT</option>
					<option value="11">Registro civil</option>
					<option value="12">Tarjeta de identidad</option>
					<option value="21">Tarjeta de extrangeria</option>
					<option value="22">Cedula extrangera</option>
					<option value="91">NUIP</option>
				</select>
			</div>
			<button type="submit" id="btnsave" name="btnsave" class="btn btn-warning btn-md">Editar</button>
	</div>
	</form>
</div>

<?php
require 'footer.php';
?> <script type="text/javascript" src="scripts/cliente.js">
</script>