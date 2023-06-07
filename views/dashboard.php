<?php
$pageTitle = "Dashboard";
require_once("./../controllers/validarAcceso.php");
require_once '../models/Contacto.php';
include("./partials/header-full.php");
?>

<div class="content p-3 w-100">
	<h2>Dashboard</h2>
	<?php
	if (isset($_SESSION['msg'])) {
		$respuesta = $_SESSION['msg'];
		if ($respuesta['sucess'] == 'true') {
	?>
			<script>
				Swal.fire(
					"Exitoso",
					'<?php echo $respuesta['info']; ?>',
					"success"
				)
			</script>
		<?php
			unset($_SESSION['msg']);
		} else { ?>
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: '<?php echo $respuesta['info']; ?>'
				})
			</script>
	<?php
		}
		unset($_SESSION['msg']);
	}
	?>
	<div class="card">
		<h4 class="card-title p-3">Opciones</h4>
		<div class="card-body pt-0">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddContact" data-bs-whatever="@mdo">Agregar Contacto</button>
		</div>
	</div>

	<?php
	$Contacto = new Contacto();
	$contactos = $Contacto->mostrarContactos($_SESSION['id_usuario']);
	?>
	<div class="container p-4">
		<table class="table table-bordered table-striped pt-3" id="myTable">
			<thead>
				<tr scope="row" class="text-center">
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
						<td scope="col"><?php echo $contacto["nombre_contacto"] ?></td>
						<td scope="col"><?php echo $contacto["email_contacto"] ?></td>
						<td>
							<a class="btn btn-warning" value="<?php echo $contacto["id_contacto"] ?>">Editar</a>
							<a class="btn btn-danger" value="<?php echo $contacto["id_contacto"] ?>">Eliminar</a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalAddContact" tabindex="-1" aria-labelledby="modalTitleContact" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Cabecero Modal -->
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="modalTitleContact">Nuevo Contacto</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<!-- Cuerpo del Modal -->
				<div class="modal-body">
					<form action="../controllers/contacto/crear.php" method="POST" id="crearContacto">
						<div class="mb-3">
							<label for="name-contact" class="col-form-label">Nombre Contacto</label>
							<input type="text" class="form-control" name="name-contact" id="name-contact" required>
						</div>
						<div class="mb-3">
							<label for="email-contact" class="col-form-label">Email Contacto</label>
							<input type="email" class="form-control" name="email-contact" id="email-contact" required></input>
						</div>
						<input type="submit" class="d-none" id="enviarContacto">
						<!-- Pie del Modal -->
						<div class="modal-footer mt-4">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<input type="submit" class="btn btn-primary" value="Guardar Contacto" id="enviar"></input>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal -->

</div>
</div>

<?php
include("./partials/footer.php");
?>