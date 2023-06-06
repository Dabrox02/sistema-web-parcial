<?php
session_start();
$pageTitle = "Registro";
if (isset($_SESSION["usuario"])) {
	unset($_SESSION["usuario"]);
}
include("./partials/header.php");
?>

<div class="container w-75 mt-5 border rounded">
	<div class="row align-items-stretch">
		<div class="col p-4 mx-2 ">
			<h2 class="fw-medium text-end pt-5 mb-5">Hola, Registrate Ahora!</h2>
			<?php
			if (isset($_SESSION['msg'])) {
				$respuesta = $_SESSION['msg'];
				if ($respuesta['sucess'] == 'true') {
			?>
					<script>
						Swal.fire(
							"Registrado",
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
			<form action="../controllers/registro.php" method="POST">
				<div class="mb-4">
					<label for="username" class="form-label">Usuario</label>
					<input type="text" class="form-control" id="username" aria-describedby="userHelp" name="username" required>
					<div id="userHelp" class="form-text">No compartas tu usuario.</div>
				</div>
				<div class="mb-4">
					<label for="password" class="form-label">Contraseña</label>
					<input type="password" class="form-control" id="password" name="password" required>
				</div>
				<div class="d-grid">
					<button type="submit" class="btn btn-primary">Registrarse</button>
				</div>
				<div class="my-3 text-start">
					<span>Ya tienes cuenta? <a href="login.php">Inicia Sesion</a></span>
				</div>
			</form>
		</div>
		<div class="col bg d-none d-md-block">
		</div>
	</div>
</div>


<?php
include("./partials/footer.php");
?>