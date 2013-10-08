<?PHP
	include('backend/validateSession.php');
	include('backend/dataAccess.php');
	$itemAction = 'agregarProducto';
	$pageTitle = 'Agregar Producto';
	if(isset($_REQUEST["id"])){
		$itemAction = 'modificarProducto';
		$pageTitle = 'Modificar Producto';
		$sql="SELECT * FROM TProduct WHERE id=".$_REQUEST["id"];
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
				<form id="FORMagregarProducto" action="backend/gestor.php" method="post" enctype="multipart/form-data">
					<!--<div id="DIVcurrentIMG">
						<article>
							<div id="holder">
							</div> 
							<p id="upload" class="hidden"><label>Drag &amp; drop not supported, but you can still upload via this input field:<br>
							<input type="file" name="image"></label></p>
							<p id="filereader">File API &amp; FileReader API not supported</p>
							<p id="formdata">XHR2's FormData is not supported</p>
							<p id="progress">XHR2's upload progress isn't supported</p>
							<p>Arrastre la imagen de la botella dentro de la zona punteada.</p>
							<progress id="uploadprogress" min="0" max="100" value="0">0</progress>
						</article>
					</div>-->
					<div class="inputAndLabel">
						<label for="nombre">Nombre:</label>
						<input type="text" id="nombre" name="nombre" class="validate[required]" value="<?=$row->nombre?>" />
					</div>
					<div class="inputAndLabel">
						<label for="image">Imagen:</label>
						<input type="file" id="image" name="image" class="validate[required]" value="" />
					</div>
					<div class="inputAndLabel">
						<label for="variedad">Variedad:</label>
						<input type="text" id="variedad" name="variedad" class="validate[required]" value="<?=$row->variedad?>" />
					</div>
					<div class="inputAndLabel">
						<label for="anada">A&ntilde;ada:</label>
						<input type="number" id="anada" name="anada" maxlength="4" class="validate[required]" value="<?=$row->anada?>" />
					</div>
					<div class="inputAndLabel">
						<label for="precio">Precio:</label>
						<input type="text" id="precio" name="precio" class="validate[required]" value="<?=$row->precio?>" />
					</div>
					<div class="inputAndLabel">
						<label for="categoria">Categor&iacute;a:</label>
						<select id="categoria" name="categoria" class="validate[required]">
							<option value="">Seleccione una categor&iacute;a</option>
							<?PHP
								$sql="SELECT id,tipo,do as denom,localizacion as loc,origen FROM TCategory;";
								$catResults=mysql_query($sql) or die ("Could not query 1".$sql);
								while ($catrow = mysql_fetch_object($catResults)) {
									if(($row->TCategory_id)==$catrow->id){
										echo '<option selected value="'.$catrow->id.'">'. $catrow->tipo. ' - ' . $catrow->denom .'</option>';
									}else{
										echo '<option value="'.$catrow->id.'">'. $catrow->tipo. ' - ' . $catrow->denom .'</option>';
									}
								}
							?>
						</select>
					</div>
					<div class="inputAndLabel">
						<label for="bodega">Bodega:</label>
						<select id="bodega" name="bodega" class="validate[required]">
							<option value="">Seleccione una bodega</option>
							<?PHP 
								$sql="SELECT nombre, id FROM TManufacturer";
								$bodResults=mysql_query($sql) or die ("Could not query 1".$sql);
								while ($bodegrow = mysql_fetch_object($bodResults)) {
									if(($row->TManufacturer_id)==$bodegrow->id){
										echo '<option selected value="'.$bodegrow->id.'">'.$bodegrow->nombre.'</option>';
									}else{
										echo '<option value="'.$bodegrow->id.'">'.$bodegrow->nombre.'</option>';
									}
								}
							?>
						</select>
					</div>
					<div class="inputAndLabel">
						<label for="cata">Cata:</label>
						<textarea id="cata" name="cata"><?=$row->cata?></textarea>
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
			print 'alert("Producto Agregado.")';
		}
		if($_GET["msj"]==2){
			print 'alert("Producto Actualizado.")';
		}
		print '</script>';
	?>
</body>
</html>