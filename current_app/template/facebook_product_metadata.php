<?PHP 
	echo '<meta property="og:image" content="data:image/jpg/png/gif;base64,'.$row['productImage'].'"/>';
	echo '<meta property="og:title" content="'.$row['nombre'].' de '.$row['nombre_bodega'].'"/>';
	echo '<meta property="og:description" content="'. htmlentities($row['descripcion']).'"/>';
	echo '<meta property="og:url" content="http://www.setratadevinos.com/producto.php?id='.$row['id'].'"/>';
	echo '<meta property="og:site_name" content="Se trata de vinos"/>';
?>