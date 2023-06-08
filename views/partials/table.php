<?php
require_once '../models/Contacto.php';

$Contacto = new Contacto();
$contactos = $Contacto->mostrarContactos($_SESSION['id_usuario']);
?>
<div class="container p-4">
	<table class="table table-bordered table-striped pt-3" id="myTable">
		<thead>
			<tr scope="row" class="text-center">
				<td scope="col">Id</td>
				<td scope="col">Nombre</td>
				<td scope="col">Email</td>
				<td scope="col">Funciones</td>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($contactos as $contacto) {
			?>
				<tr scope="row" class="text-center">
					<td scope="col"><?php echo $contacto["id_contacto"] ?></td>
					<td scope="col"><?php echo $contacto["nombre_contacto"] ?></td>
					<td scope="col"><?php echo $contacto["email_contacto"] ?></td>
					<td>
						<a type="button" href="./editar.php?id_contacto=<?php echo $contacto["id_contacto"] ?>" id="editar" class="btn btn-warning">Editar</a>
						<a type="button" href="./../controllers/contacto/eliminar.php?id_contacto=<?php echo $contacto["id_contacto"] ?>" class="btn btn-danger">Eliminar</a>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>