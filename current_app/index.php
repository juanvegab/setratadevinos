<?PHP	include('admin/backend/dataAccess.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
 <script src="scripts/script.js" type="text/javascript"></script>
	 <!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->
	<link href="styles/style.css" rel="stylesheet" type="text/css"> 
	<title>Se trata de vinos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<div id="DIVwrapper">
		<?PHP include 'template/header.php'; ?> 
		<div id="DIVbanner">
			<div id="DIVslider" class="cf">
				<div><img class="flexImg" src="img/banner3.jpg" alt="Se trata de vinos" title="Se trata de vinos" /></div>
				<div><img class="flexImg" src="img/banner4.jpg" alt="Se trata de vinos" title="Se trata de vinos" /></div>
				<div><img class="flexImg" src="img/banner1.jpg" alt="Se trata de vinos" title="Se trata de vinos" /></div>
				<div><img class="flexImg" src="img/banner2.jpg" alt="Se trata de vinos" title="Se trata de vinos" /></div>
			</div>
		</div>
		<div id="DIVcontent">
			<div id="DIVproductList">
				<h2>Lista de Productos</h2>
				<div id="DIVwineList" class="cf">
					<?PHP
						$sql = "SELECT TProduct.nombre, TCategory.tipo as tipo, TProduct.cata, TProduct.variedad, anada, TCategory.do as do, TManufacturer.nombre as nombre_bodega, TProduct.descripcion, precio, TProduct.imageURL as productImage, TProduct.id, disable,TCategory_id as id_categoria, TManufacturer_id as id_bodega FROM TProduct LEFT JOIN TCategory ON TProduct.TCategory_id = TCategory.id LEFT JOIN TManufacturer ON TProduct.TManufacturer_id = TManufacturer.id";
						if ($result=mysql_query($sql) or die ("Could not query ".$sql)) {
							while($row=mysql_fetch_array($result)){
								echo '<a class="productElement" href="producto.php?id='.$row['id'].'">';
								echo '	<div>';
								echo '		<img height="240" width="79" src="data:image/jpg/png/gif;base64,'.$row['productImage']. '" alt="'.$row['nombre'].' de '.$row['nombre_bodega'].'" title="'.$row['nombre'].' de '.$row['nombre_bodega'].' - '.$row['tipo'].'" />';
								echo '		<p class="manufacturerName" title="'.$row['nombre_bodega'].'">'.$row['nombre_bodega'].'</p>';
								echo '	</div>';
								echo '	<p> <span title="'.$row['nombre'].'">'.$row['nombre'].'</span> - <span>'.$row['tipo'].'</span></p>';
								echo '</a>';
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