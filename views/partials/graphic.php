<?php
require_once '../models/Contacto.php';

$Contacto = new Contacto();
$contactos = $Contacto->obtenerEstadisticas($_SESSION['id_usuario']);
?>

<div class="card">
	<h3 class="card-title p-3 pb-0">Graficas</h3>
	<div class="card-body">
		<b>Tipos de correo por contacto</b>
		<?php
		foreach ($contactos as $contacto) {
		?>
			<div class="resultado pt-0 mt-0">
				<?php
				echo $contacto['dominio'] . " = " . $contacto['cantidad'];
				?>
			</div>
		<?php
		}
		?>
		<div class="contenedor-grafica p-2">
			<canvas id="grafica"></canvas>
		</div>
	</div>
</div>

<script>

</script>