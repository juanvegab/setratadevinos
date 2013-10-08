<?PHP
	include('admin/backend/dataAccess.php');
	$id = $_GET["id"];
	if(!isset($id)){$id=1;}
	$sql = "SELECT TProduct.nombre, TCategory.tipo as tipo, TProduct.cata, TProduct.variedad, anada, TCategory.do as do, TManufacturer.nombre as nombre_bodega, TProduct.descripcion, precio, TProduct.imageURL as productImage, TProduct.id, disable,TCategory_id as id_categoria, TManufacturer_id as id_bodega FROM TProduct LEFT JOIN TCategory ON TProduct.TCategory_id = TCategory.id LEFT JOIN TManufacturer ON TProduct.TManufacturer_id = TManufacturer.id WHERE TProduct.id=".$id;
	if ($result=mysql_query($sql) or die ("Could not query ".$sql)) {
		if($row=mysql_fetch_array($result)){ 
?>
<!DOCTYPE html>
<html>
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
	<script src="scripts/script.js" type="text/javascript"></script>
	<link href="styles/style.css" rel="stylesheet" type="text/css">
	<!--[if gte IE 9]>
	 <style type="text/css">
	   .gradient {
	      filter: none;
	   }
	 </style>
	<![endif]-->
	<title><?PHP echo $row['nombre'].', un '.$row['tipo'].' de '.$row['nombre_bodega']; ?> - Se trata de vinos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?PHP include('template/facebook_product_metadata.php') ?>
</head>
<body>
	<div id="DIVwrapper">
		<?PHP include 'template/header.php'; ?> 
		<div id="DIVcontent">
			<h2><?PHP echo $row['nombre'].', un '.$row['tipo'].' de '.$row['nombre_bodega']; ?></h2>
			<div id="DIVproductView">
				<div id="DIVproductImg"><img class="flexImg" src="<?PHP echo 'data:image/jpg/png/gif;base64,'.$row['productImage']. ''; ?>" alt="<?PHP echo $row['nombre'].' de '.$row['nombre_bodega'].' - '.$row['tipo']; ?>" title="<?PHP echo $row['nombre'].' de '.$row['nombre_bodega'].' - '.$row['tipo']; ?>" /></div>
				<div id="DIVproductInfo">
					<?PHP include('template/facebook_share_btn.php');?>
					<h3><?PHP echo $row['nombre']; ?></h3>
					<div id="DIVwineInfo">
						<div>
							<h4>Nombre</h4>
							<p><?PHP echo $row['nombre']; ?></p>
						</div>
						<div>
							<h4>Tipo</h4>
							<p><?PHP echo $row['tipo']; ?></p>
						</div>
						<div>
							<h4>Variedad</h4>
							<p><?PHP echo $row['variedad']; ?></p>
						</div>
						<div>
							<h4>A&ntilde;ada</h4>
							<p><?PHP echo $row['anada']; ?></p>
						</div>
						<div>
							<h4>Precio</h4>
							<p class="colones">¢<?PHP echo $row['precio']; ?></p>
						</div>
						<div>
							<h4>Denominaci&oacute;n de Origen</h4>
							<p><?PHP echo $row['do']; ?></p>
						</div>
						<div>
							<h4>Bodega</h4>
							<p><?PHP echo $row['nombre_bodega']; ?></p>
						</div>
					</div>
					<div id="DIVwineDesc">
							<h4>Descripci&oacute;n</h4>
							<div class="contentText"><p><?PHP echo $row['descripcion']; ?></p></div>
							<h4>Cata</h4>
							<div class="contentText"><p><?PHP echo $row['cata']; ?></p></div>
					</div>
					<?PHP 
							}else{
								echo '<p>El producto seleccionado no esta disponible.</p>';
							}
						}
					?>
				</div>
			</div>
			<a class="backBtn" href="../" title="Volver al inicio." >Volver</a>
		</div>
		<?PHP include 'template/footer.php'; ?> 
	</div>
</body>
</html>