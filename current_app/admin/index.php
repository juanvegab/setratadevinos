<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link href="../styles/style.css" rel="stylesheet" type="text/css">
	<title>Se trata de vinos</title>
</head>
<body>
	<div id="DIVwrapper" class="login maintenancePages">
		<div id="DIVcontent">
			<img src="../img/STDV.png" alt="Se trata de vinos" width="" height=""/>
			<div id="DIVcinta">
				<h1>Mantenimiento del Sitio</h1>
				<form method="post" action="backend/gestor.php">
					<h3>Iniciar Sesi&oacute;n</h3>
					<div class="inputAndLabel">
						<label for="nombre">Nombre de usuario:</label>
						<input type="text" name="username">
					</div>
					<div class="inputAndLabel">
						<label for="nombre">Contraseña:</label>
						<input type="password" name="password">
					</div>
					<div class="inputBTN">
						<input type="submit" id="BTNsubmit" name="Iniciar" value="Iniciar">
					</div>
					<input type="hidden" name="action" value="login">
				</form>
			</div>
		</div>
		<?PHP include 'template/footer.php'; ?>
	</div>
</body>
</html>