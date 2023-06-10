<?php
$pageTitle = "Inicio";
require_once("./../controllers/validarAcceso.php");
include("./partials/header-full.php");
?>


<div class="content p-3 w-100">
	<h2>Bienvenido,
		<span>
			<?php
			echo $_SESSION["usuario"];
			?>
		</span>
	</h2>
	<?php
	include("./partials/graphic.php");
	?>
</div>

<?php
include("./partials/footer.php");
?>