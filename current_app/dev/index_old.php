<?PHP	include('admin/backend/dataAccess.php'); ?>
<!DOCTYPE html>
<html>
<head>
 <script src="scripts/script.js" type="text/javascript"></script>
 <link href="styles/style.css" rel="stylesheet" type="text/css"> 
 <title>Se trata de vinos</title>
</head>
<body>
	<div id="DIVwrapper">
		<?PHP include 'template/header.php'; ?> 
		<div id="DIVbanner">
			<div id="DIVslider"><img class="flexImg" src="img/BannerV2.jpg" /></div>
		</div>
		<div id="DIVcontent">
			<div id="DIVfilter">
				<h2>Bodegas</h2>
				<div class="filterElement">
					<span>Todas</span>
					<ul>
						<li>Gormaz</li>
						<li>Eresma</li>
						<li>Mitarte</li>
						<li>Barreda</li>
						<li>Iniesta</li>
					</ul>
				</div>
				<h2>Categorias</h2>
				<div class="filterElement">
					<span>Todas</span>
					<ul>
						<li>Tinto</li>
						<li>Arenoso</li>
						<li>Blanco</li>
						<li>Seco</li>
					</ul>
				</div>
			</div>
			<div id="DIVproductList">
				<h2>Lista de Productos</h2>
				<div>
					<?PHP
						$sql = "SELECT TProduct.nombre, TCategory.tipo as tipo, TProduct.cata, TProduct.variedad, anada, TCategory.do as do, TManufacturer.nombre as nombre_bodega, TProduct.descripcion, precio, TProduct.imageURL as productImage, TProduct.id, disable,TCategory_id as id_categoria, TManufacturer_id as id_bodega FROM TProduct LEFT JOIN TCategory ON TProduct.TCategory_id = TCategory.id LEFT JOIN TManufacturer ON TProduct.TManufacturer_id = TManufacturer.id";
						if ($result=mysql_query($sql) or die ("Could not query ".$sql)) {
							$productList = '{"products": [';
							while($row=mysql_fetch_array($result)){
								echo '<div class="productElement">';
								echo '<img src="data:image/jpg/png/gif;base64,'.$row['productImage']. '" alt="'.$row['nombre'].' de '.$row['nombre_bodega'].'" title="'.$row['nombre'].' de '.$row['nombre_bodega'].'" />';
								echo '	<div>';
								echo '		<p class="productName" title="'.$row['nombre'].'">'.$row['nombre'].'</p>';
								echo '		<p class="manufacturerName" title="'.$row['nombre_bodega'].'">'.$row['nombre_bodega'].'</p>';
								echo '		<p class="doName" title="'.$row['do'].'">'.$row['do'].'</p>';
								echo '		<p class="detailsButton">Detalles</p>';
								echo '	</div>';
								echo '</div>';
							}
						}
					?>
				</div>
			</div>
		</div>
		<?PHP include 'template/footer.php'; ?> 
	</div>
</body>
</html>