<?php
$pageTitle = "Editar";
require_once("./../controllers/validarAcceso.php");
require_once '../models/Contacto.php';
include("./partials/header-full.php");

$idContacto = $_GET['id_contacto'];
$idUsuario = $_SESSION['id_usuario'];
$Contacto = new Contacto();

$contacto_obt = $Contacto->obtenerContacto($idUsuario, $idContacto);
$name = $contacto_obt["nombre_contacto"];
$email = $contacto_obt["email_contacto"];

if (empty($name) || empty($email)) {
	header("location: ./dashboard.php");
}

?>

<div class="content p-3">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-5">
				<div class="d-flex justify-content-start">
					<div class="card w-100">
						<h4 class="card-title p-3">Editar Contacto</h4>
						<div class="card-body pt-0">
							<form action="../controllers/contacto/editar.php" method="POST" id="crearContacto">
								<div class="mb-3">
									<label for="name-contact" class="col-form-label">Nombre Contacto</label>
									<input type="text" class="form-control" name="name-contact" id="name-contact" value="<?php echo $name ?>" required>
								</div>
								<div class="mb-3">
									<label for="email-contact" class="col-form-label">Email Contacto</label>
									<input type="email" class="form-control" name="email-contact" id="email-contact" value="<?php echo $email ?>" required></input>
									<input type="text" class="d-none" name="id-contact" value="<?php echo $idContacto ?>" required>
								</div>
								<div class="modal-footer mt-4">
									<input type="submit" class="btn btn-primary" value="Editar Contacto" id="editar"></input>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
include("./partials/footer.php");
?>