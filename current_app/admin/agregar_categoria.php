<?PHP
	include('backend/validateSession.php');
	include('backend/dataAccess.php');
	$itemAction = 'agregarCategoria';
	$pageTitle = 'Agregar Categoria';
	if(isset($_REQUEST["id"])){
		$itemAction = 'modificarCategoria';
		$pageTitle = 'Modificar Categoria';
		$sql="SELECT * FROM TCategory WHERE id=".$_REQUEST["id"];
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
				<form action="backend/gestor.php" id="FORMagregarCategoria" method="post" class="shortForm">
					<div class="inputAndLabel">
						<label for="tipo">Tipo:</label>
						<input type="text" id="tipo" name="tipo" class="validate[required]" value="<?=$row->tipo?>" />
					</div>
					<div class="inputAndLabel">
						<label for="do">D.O.:</label>
						<input type="text" id="do" name="do" class="validate[required]" value="<?=$row->do?>" />
					</div>
					<div class="inputAndLabel">
						<label for="vendimia">Vendimia:</label>
						<input type="text" id="vendimia" name="vendimia" class="validate[required]" value="<?=$row->vendimia?>" />
					</div>
					<div class="inputAndLabel">
						<label for="localizacion">Localizaci&oacute;n:</label>
						<input type="text" id="localizacion" name="localizacion" class="validate[required]" value="<?=$row->localizacion?>" />
					</div>
					<div class="inputAndLabel">
						<label for="origen">Origen:</label>
						<input type="text" id="origen" name="origen" class="validate[required]" value="<?=$row->origen?>" />
					</div>
					<div class="inputAndLabel">
						<label for="suelo">Suelo:</label>
						<input type="text" id="suelo" name="suelo" class="validate[required]" value="<?=$row->suelo?>" />
					</div>
					<div class="inputAndLabel">
						<label for="riego">Riego:</label>
						<select id="riego" name="riego" class="validate[required]">
							<option value="">Seleccione...</option>
							<option <? if($row->riego == 1 && empty($row)==false){echo 'selected="selected"';} ?> value="1">Si</option>
							<option <? if($row->riego == 0 && empty($row)==false){echo 'selected="selected"';} ?> value="0">No</option>
						</select>
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
			print 'alert("Categoria Agregada.")';
		}
		if($_GET["msj"]==2){
			print 'alert("Categoria Actualizada.")';
		}
		print '</script>';
	?>
</body>
</html>