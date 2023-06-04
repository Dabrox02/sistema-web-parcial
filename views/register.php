<?php
$pageTitle = "Registro";
include("./partials/header.php");
?>

<div class="container w-75 mt-5 border rounded">
	<div class="row align-items-stretch">
		<div class="col p-4 mx-2 ">
			<h2 class="fw-medium text-end pt-5 mb-5">Hola, Registrate Ahora!</h2>
			<form action="../controllers/register/registro.php" method="POST">
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