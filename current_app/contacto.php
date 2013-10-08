<?PHP	include('admin/backend/dataAccess.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
	<script src="scripts/script.js" type="text/javascript"></script>
	<script src="admin/scripts/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
	<script src="admin/scripts/htmlEditor.js" type="text/javascript"></script>
	 <!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->
	<link href="styles/style.css" rel="stylesheet" type="text/css">
	<link href="../styles/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
	<title>Contacto - Se trata de vinos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<div id="DIVwrapper">
		<?PHP include 'template/header.php'; ?> 
		<div id="DIVbanner">
			<div id="" class="cf">
				<div><img class="flexImg" src="img/banner2.jpg" alt="Se trata de vinos" title="Se trata de vinos" /></div>
			</div>
		</div>
		<div id="DIVcontent" class="pageAddProduct">
			<div id="DIVaddProduct">
				<h2>Contacto</h2>
				<form id="FORMcontacto" action="admin/backend/gestor.php" method="post" enctype="multipart/form-data">
					<div class="inputAndLabel">
						<label for="variedad">Nombre:</label>
						<input type="text" id="nombre" name="nombre" class="validate[required]" value="" />
					</div>
					<div class="inputAndLabel">
						<label for="anada">Correo:</label>
						<input type="email" id="correo" name="correo" class="validate[required]" value="" />
					</div>
					<div class="inputAndLabel">
						<label for="anada">Tel&eacute;fono:</label>
						<input type="text" id="telefono" name="telefono" class="validate[required]" value="" />
					</div>
					<div class="inputAndLabel">
						<label for="mensaje">Pedido, consulta o comentario:</label>
						<textarea id="mensaje" name="mensaje"></textarea>
					</div>
					<input type="hidden" value="contacto" name="action" />
					<div class="inputBTN cf">
						<input type="submit" id="BTNsubmit" name="enviar" value="Enviar" />
					</div>
				</form>
			</div>
		</div>
		<?PHP include 'template/footer.php'; ?> 
	</div>
		<?PHP 
			print '<script type="text/javascript">';
			if($_GET["msj"]==1){
				print 'alert("Mensaje enviado.")';
			}else if($_GET["msj"]==2){
				print 'alert("Error al enviar el mensaje.")';
			}
			print '</script>';
		?>
</body>
</html>