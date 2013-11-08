<?PHP
	include('dataAccess.php');
	$action = $_GET["action"];

	if($action=='1'){
		
	}else if($action=='2'){
		
	}else if($action=='3'){
		
	}else if($action=='4'){
		
	}else if($action=='5'){
		
	}else if($action=='6'){
		
	}else if($action=='7'){
		
	}else if($action=='8'){
		
	}else if($action=='9'){
		print getAllProducts();
	}else if($action=='10'){
		print getAllBodegas();
	}else if($action=='11'){
		contact();
	}else if($action=='11'){
		
	}else if($action=='12'){
		
	}else{
		echo "Backend Manager";
	}

function contact(){
	$header = 'From: ' . $_POST["correo"] . " \r\n"; 
	$header .= "X-Mailer: PHP/" . phpversion() . " \r\n"; 
	$header .= "Mime-Version: 1.0 \r\n"; 
	$header .= "Content-Type: text/html; charset=ISO-8859-1"; 
	$to = "info@setratadevinos.com";
	$subject = "Contacto desde el sitio web - ".$_POST["nombre"] ;
	$body = "<br /><br /><br />Mensaje de " . $_POST["nombre"] . " <br /><br />Tel&eacute;fono: " . $_POST["telefono"] . " <br /><br />E-mail: " . $_POST["correo"] . " <br /><br />Mensaje: <br /><br />" . $_POST["mensaje"];
	if (mail($to, $subject, $body, $header)) {
		header ("Location: ../../#/contacto/1");
	}else{
		header ("Location: ../../#/contacto/2");
		exit;
	}
}

function escapeJsonString($value) { # list from www.json.org: (\b backspace, \f formfeed)
	$escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
	$replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
	$result = str_replace($escapers, $replacements, $value);
	return $result;
}

function jsonRemoveUnicodeSequences($struct) {
	return preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($struct));
}

function getAllBodegas(){
	$sql = "SELECT nombre, descripcion, ubicacion, direccion, imageURL, id FROM TManufacturer;";
	$json = array();
	$results = mysql_query($sql);
	
	
	while($r=mysql_fetch_array($results)){
		$elementAux = array(
			"nombre" => htmlentities($r['nombre']),
			"descripcion" => stripslashes(utf8_encode($r['descripcion'])),
			"ubicacion" => htmlentities($r['ubicacion']),
			"direccion" => htmlentities($r['direccion']),
			"imageURL" => $r['imageURL'],
			"id" => $r['id']
		);
		array_push($json, $elementAux);
	}
	return json_encode($json);
}

function getAllProducts(){
	$sql = "SELECT TProduct.nombre as name, TCategory.tipo as tipo, TProduct.cata as cata, TProduct.variedad as variedad, anada, TCategory.do as do, TManufacturer.nombre as nombre_bodega, TProduct.descripcion as descripcion, precio, TProduct.imageURL as product_image, TProduct.id as id_producto, disable, TCategory_id as id_categoria, TManufacturer_id as id_bodega FROM TProduct LEFT JOIN TCategory ON TProduct.TCategory_id = TCategory.id LEFT JOIN TManufacturer ON TProduct.TManufacturer_id = TManufacturer.id";
	$json = array();
	$results = mysql_query($sql);
	
	while($r=mysql_fetch_array($results)){
		$elementAux = array(
			"nombre" => htmlentities($r['name']),
			"tipo" => htmlentities($r['tipo']),
			"variedad" => htmlentities($r['variedad']),
			"anada" => htmlentities($r['anada']),
			"product_image" => $r['product_image'],
			"do" => htmlentities($r['do']),
			"descripcion" => stripslashes(utf8_encode($r['descripcion'])),
			"cata" => stripslashes(utf8_encode($r['cata'])),
			"nombre_bodega" => htmlentities($r['nombre_bodega']),
			"precio" => $r['precio'],
			"id" => $r['id_producto'],
			"disable" => $r['disable'],
			"id_categoria" => $r['id_categoria'],
			"id_bodega" => $r['id_bodega']
		);
		array_push($json, $elementAux);
	}
	return json_encode($json);
}
?>