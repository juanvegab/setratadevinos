<?PHP
	include('backend/validateSession.php');
	include('backend/dataAccess.php');
	$itemAction = 'agregarBodega';
	$pageTitle = 'Agregar Bodega';
	if(isset($_REQUEST["id"])){
		$itemAction = 'modificarBodega';
		$pageTitle = 'Modificar Bodega';
		$sql="SELECT * FROM TManufacturer WHERE id=".$_REQUEST["id"];
		$result = mysql_query($sql) or die ("Could not query .. ".$sql);
		$row = mysql_fetch_object($result);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>
	<script src="scripts/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/htmlEditor.js" type="text/javascript"></script>
	<script src="scripts/script.js" type="text/javascript"></script>
	<link href="../styles/style.css" rel="stylesheet" type="text/css">
	<link href="../styles/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
	<title>Se trata de vinos - <?PHP echo $pageTitle;?></title>
</head>
<body>
	<div id="DIVwrapper" class="pageAddProduct maintenancePages">
		<?PHP include 'template/header.php'; ?>
		<div id="DIVcontent">
			<div id="DIVaddProduct">
				<h2><?PHP echo $pageTitle;?></h2>
				<form action="backend/gestor.php" id="FORMagregarBodega" method="post" class="shortForm">
					<div class="inputAndLabel">
						<label for="nombre">Nombre:</label>
						<input type="text" id="nombre" name="nombre" class="validate[required]" value="<?=$row->nombre?>" />
					</div>
					<div class="inputAndLabel">
						<label for="ubicacion">Ubicaci&oacute;n:</label>
						<input type="text" id="ubicacion" name="ubicacion" class="validate[required]" value="<?=$row->ubicacion?>" />
					</div>
					<div class="inputAndLabel">
						<label for="direccion">Direcci&oacute;n:</label>
						<input type="text" id="direccion" name="direccion" class="validate[required]" value="<?=$row->direccion?>" />
					</div>
					<div class="inputAndLabel">
						<label for="descripcion">Descripci&oacute;n:</label>
						<textarea id="descripcion" name="descripcion"><?=$row->descripcion?></textarea>
					</div>
					<input type="hidden" value="<?PHP echo $itemAction;?>" name="action" />
					<input type="hidden" id="id" name="id" value="<?PHP echo $_REQUEST["id"];?>" />
					<div class="inputBTN cf">
						<input type="submit" id="BTNsubmit" name="guardar" value="Guardar" />
					</div>
				</form>
			</div>
		</div>
		<?PHP include 'template/footer.php'; ?>
 </div>
	<?PHP 
		print '<script type="text/javascript">';
		if($_GET["msj"]==1){
			print 'alert("Bodega Agregada.")';
		}
		if($_GET["msj"]==2){
			print 'alert("Bodega Actualizada.")';
		}
		print '</script>';
	?>
</body>
</html>