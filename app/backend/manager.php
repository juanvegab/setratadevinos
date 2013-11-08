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
		$sql = "SELECT TProduct.nombre, TCategory.tipo as tipo, TProduct.cata, TProduct.variedad, anada, TCategory.do as do, TManufacturer.nombre as nombre_bodega, TProduct.descripcion, precio, TProduct.imageURL as productImage, TProduct.id, disable,TCategory_id as id_categoria, TManufacturer_id as id_bodega FROM TProduct LEFT JOIN TCategory ON TProduct.TCategory_id = TCategory.id LEFT JOIN TManufacturer ON TProduct.TManufacturer_id = TManufacturer.id";
		$json = array();
		$results = mysql_query($sql);
		
		while($r=mysql_fetch_array($results)){
			$elementAux = array(
				"nombre" => $r['nombre'],
				"tipo" => $$r['tipo'],
				"variedad" => $r['variedad'],
				"do" => $$r['do'],
				"anada" => $$r['anada'],
				"nombre_bodega" => $r['nombre_bodega'],
				"precio" => $r['precio'],
				"imageURL" => $r['imageURL'],
				"id" => $r['id'],
				"disable" => $r['disable'],
				"id_categoria" => $r['id_categoria'],
				"id_bodega" => $r['id_bodega']
			);
			array_push($json, $elementAux);
		}
		
		print json_encode($json);
		
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
	}else if($action=='10'){
		
	}else if($action=='11'){
		
	}else if($action=='12'){
		
	}else{
		echo "Backend Manager";
	}
?>