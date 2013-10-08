<?PHP
	include('dataAccess.php');

	$action = $_POST["action"];

	if($action=='agregarProducto'){
	
		$nombre = $_POST["nombre"];
		$descripcion = $_POST["descripcion"];
		$precio = $_POST["precio"];
		$categoria = $_POST["categoria"];
		$bodega = $_POST["bodega"];
		$disable = $_POST["disable"];
		$cata = $_POST["cata"];
		$variedad = $_POST["variedad"];
		$anada = $_POST["anada"];
		//echo "caca ".getimagesize($_FILES['image']);;
		$data = file_get_contents($_FILES['image']['tmp_name']);
		$data = base64_encode($data);
		$data = mysql_real_escape_string($data);
		
		$sql = "INSERT INTO TProduct (nombre, descripcion, precio, TCategory_id, TManufacturer_id, disable, cata, variedad, anada, imageURL) 
		VALUES ('".$nombre."', '".$descripcion."', '".$precio."', '".$categoria."', '".$bodega."', '".$disable."', '".$cata."', '".$variedad."', '".$anada."', '".$data."')";

		if (!$mysqli->query($sql)) {
			echo 'Execute failed: ' + $mysqli->error;
		}else{
			header ("Location: ../agregar_producto.php?msj=1");
			exit;
		}
		
	}else if($action=='agregarBodega'){
		
		$nombre = $_POST["nombre"];
		$descripcion = $_POST["descripcion"];
		$ubicacion = $_POST["ubicacion"];
		$direccion = $_POST["direccion"];		
		$sql = "INSERT INTO TManufacturer SET nombre='".$nombre."', descripcion='".$descripcion."', ubicacion='".$ubicacion."', direccion='".$direccion."'";
		
		if (!$mysqli->query($sql)) {
			echo 'Execute failed: ' + $mysqli->error;
		}else{
			header ("Location: ../agregar_bodega.php?msj=1");
			exit;
		}
	}else if($action=='modificarBodega'){
		$nombre = $_POST["nombre"];
		$descripcion = $_POST["descripcion"];
		$ubicacion = $_POST["ubicacion"];
		$direccion = $_POST["direccion"];	
		$id = $_POST["id"];
		$sql = "UPDATE TManufacturer SET nombre='".$nombre."', descripcion='".$descripcion."', ubicacion='".$ubicacion."', direccion='".$direccion."' WHERE id='".$id."'";
		if (!$mysqli->query($sql)) {
			echo 'Execute failed: ' + $mysqli->error;
		}else{
			header ("Location: ../agregar_bodega.php?msj=2&id=".$id."");
			exit;
		}
	}else if($action=='modificarCategoria'){
		$tipo = $_POST["tipo"];
		$do = $_POST["do"];
		$vendimia = $_POST["vendimia"];
		$localizacion = $_POST["localizacion"];	
		$origen = $_POST["origen"];
		$suelo = $_POST["suelo"];
		$riego = $_POST["riego"];
		$id = $_POST["id"];
		$sql = "UPDATE TCategory SET tipo='".$tipo."', do='".$do."', vendimia='".$vendimia."', localizacion='".$localizacion."', origen='".$origen."', suelo='".$suelo."', riego='".$riego."' WHERE id='".$id."'";
		if (!$mysqli->query($sql)) {
			echo 'Execute failed: ' + $mysqli->error;
		}else{
			header ("Location: ../agregar_categoria.php?msj=2&id=".$id."");
			exit;
		}
	}else if($action=='modificarProducto'){
		$nombre = $_POST["nombre"];
		$descripcion = $_POST["descripcion"];
		$precio = $_POST["precio"];
		$categoria = $_POST["categoria"];
		$bodega = $_POST["bodega"];
		$disable = $_POST["disable"];
		$cata = $_POST["cata"];
		$variedad = $_POST["variedad"];
		$anada = $_POST["anada"];
		$id = $_POST["id"];
		$data = @file_get_contents($_FILES['image']['tmp_name']);
		
		$sql = "SELECT * TProduct WHERE id='".$id."'";
		
		if($data === false){
			$sql = "UPDATE TProduct SET nombre='".$nombre."', descripcion='".$descripcion."', precio='".$precio."', TCategory_id='".$categoria."', TManufacturer_id='".$bodega."', disable='".$disable."', cata='".$cata."', variedad='".$variedad."', anada='".$anada."' WHERE id='".$id."'";
		}else{
			$data = file_get_contents($_FILES['image']['tmp_name']);
			$data = base64_encode($data);
			$data = mysql_real_escape_string($data);
			$sql = "UPDATE TProduct SET nombre='".$nombre."', descripcion='".$descripcion."', precio='".$precio."', TCategory_id='".$categoria."', TManufacturer_id='".$bodega."', disable='".$disable."', cata='".$cata."', variedad='".$variedad."', anada='".$anada."', imageURL='".$data."' WHERE id='".$id."'";
		}
		
		if (!$mysqli->query($sql)) {
			echo 'Execute failed: ' + $mysqli->error;
		}else{
			header ("Location: ../agregar_producto.php?msj=2&id=".$id."");
			exit;
		}
	}else if($action=='agregarCategoria'){
	
		$tipo = $_POST["tipo"];
		$do = $_POST["do"];
		$vendimia = $_POST["vendimia"];
		$localizacion = $_POST["localizacion"];
		$origen = $_POST["origen"];
		$suelo = $_POST["suelo"];
		$riego = $_POST["riego"];
		$sql = "INSERT INTO TCategory (tipo, do, vendimia, localizacion, origen, suelo, riego)	VALUES ('".$tipo."', '".$do."', '".$vendimia."', '".$localizacion."', '".$origen."', '".$suelo."', '".$riego."')";
		if (!$mysqli->query($sql)) {
			echo 'Execute failed: ' + $mysqli->error;
		}else{
			header ("Location: ../agregar_categoria.php?msj=1");
			exit;
		}
	}else if($action=='login'){
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$sql = "SELECT EXISTS(SELECT 1 FROM TUser WHERE username='".$username."' AND password='".$password."') as existe";
		$result=mysql_query($sql) or die ("Could not query ".$sql);
		while($row=mysql_fetch_array($result)){
			if($row['existe'] == 1){
				$sql = "SELECT * FROM TUser WHERE username='".$username."' AND password='".$password."'";
				$result=mysql_query($sql) or die ("Could not query ".$sql);
				while($row=mysql_fetch_array($result)){
					session_start();
					$_SESSION['username'] = $row['username'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['lastname'] = $row['lastname'];
					$_SESSION['email'] = $row['email'];
				}
				header ("Location: ../productos.php");
				exit;
			}else{
				header ("Location: ../index.php");
				exit;
			}
		}
		
	}else if($action=='getProductJson'){
		$sql = "SELECT TProduct.nombre, TCategory.tipo as tipo, TProduct.cata, TProduct.variedad, anada, TCategory.do as do, TManufacturer.nombre as nombre_bodega, TProduct.descripcion, precio, TProduct.imageURL, TProduct.id, disable,TCategory_id as id_categoria, TManufacturer_id as id_bodega FROM TProduct LEFT JOIN TCategory ON TProduct.TCategory_id = TCategory.id LEFT JOIN TManufacturer ON TProduct.TManufacturer_id = TManufacturer.id";
		if ($result=mysql_query($sql) or die ("Could not query ".$sql)) {
				$productList = '{"products": [';
				while($row=mysql_fetch_array($result)){
					$productList .= '{ 
								"nombre":"'.$row['nombre'].'" ,
								"tipo":"'.$row['tipo'].'" , 
								"variedad":"'.$row['variedad'].'", 
								"do":"'.$row['do'].'", 
								"anada":"'.$row['anada'].'", 
								"nombre_bodega":"'.$row['nombre_bodega'].'", 
								"precio":"'.$row['precio'].'", 
								"imageURL":"'.$row['imageURL'].'", 
								"id":"'.$row['id'].'", 
								"disable":"'.$row['disable'].'", 
								"id_categoria":"'.$row['id_categoria'].'", 
								"id_bodega":"'.$row['id_bodega'].'"},';
				}
				$productList .= ']}';
				$productList = str_replace(",]}", "]}", $productList);
				echo $productList;
  }
	}else if($action=='getBodegaJson'){
		$sql = "SELECT nombre, descripcion, ubicacion, direccion, id FROM TManufacturer;";
		if ($result=mysql_query($sql) or die ("Could not query ".$sql)) {
			$bodegasList = '{"bodegas": [';
			while($row=mysql_fetch_array($result)){
				$bodegasList .= '{ 
							"nombre":"'.$row['nombre'].'" ,
							"ubicacion":"'.$row['ubicacion'].'",
							"direccion":"'.$row['direccion'].'",
							"id":"'.$row['id'].'"},';
			}
			$bodegasList .= ']}';
			$bodegasList = str_replace(",]}", "]}", $bodegasList);
			echo $bodegasList;
		}
	}else if($action=='getCategoriaJson'){
		$sql = "SELECT tipo, do, vendimia, localizacion, origen, suelo, riego, id FROM TCategory;";
		if ($result=mysql_query($sql) or die ("Could not query ".$sql)) {
			$categoriasList = '{"categorias": [';
			while($row=mysql_fetch_array($result)){
				$categoriasList .= '{ 
							"tipo":"'.$row['tipo'].'" ,
							"denom":"'.$row['do'].'" ,
							"vendimia":"'.$row['vendimia'].'",
							"localizacion":"'.$row['localizacion'].'",
							"origen":"'.$row['origen'].'",
							"suelo":"'.$row['suelo'].'",
							"riego":"'.$row['riego'].'",
							"id":"'.$row['id'].'"},';
			}
			$categoriasList .= ']}';
			$categoriasList = str_replace(",]}", "]}", $categoriasList);
			echo $categoriasList;
		}
	}else if($action=='deleteElement'){
		$sql = "DELETE FROM T".$_POST['element']." WHERE id=".$_POST['idElemento'];
		if (!$mysqli->query($sql)) {
			echo 'Elemento no eliminado. n/El elemento tiene 1 o mas productos asociados.';
		}else{
			echo ('El item ha sido eliminado correctamente.');
		}
	}else if($action=='contacto'){
		$header = 'From: ' . $_POST["correo"] . " \r\n"; 
		$header .= "X-Mailer: PHP/" . phpversion() . " \r\n"; 
		$header .= "Mime-Version: 1.0 \r\n"; 
		$header .= "Content-Type: text/html; charset=ISO-8859-1"; 
		$to = "info@setratadevinos.com";
		$subject = "Contacto desde el sitio web - ".$_POST["nombre"] ;
		$body = "<br /><br /><br />Mensaje de " . $_POST["nombre"] . " <br /><br />Tel&eacute;fono: " . $_POST["telefono"] . " <br /><br />E-mail: " . $_POST["correo"] . " <br /><br />Mensaje: <br /><br />" . $_POST["mensaje"];
		if (mail($to, $subject, $body, $header)) {
			header ("Location: ../../contacto.php?msj=1");
		}else{
			header ("Location: ../../contacto.php?msj=2");
			exit;
		}
	}else if($action=='newAction'){
		
	}
	
	//echo "<img alt=Embedded Image src=\"data:image/png;base64,data=\" />";
	
?>