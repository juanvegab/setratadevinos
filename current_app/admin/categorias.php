<?PHP
	include('backend/validateSession.php');
	include('backend/dataAccess.php');
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="scripts/script.js" type="text/javascript"></script>
	<link href="../styles/style.css" rel="stylesheet" type="text/css"> 
	<title>Se trata de vinos</title>
</head>
<body>
	<div id="DIVwrapper" class="pageMaintenance maintenancePages">
		<?PHP include 'template/header.php'; ?>
		<div id="DIVcontent">
			<div id="DIVproductList">
				<h2>Mantenimiento de Categorias</h2>
				<div>
					<table id="TABLEcategoryList">
						<thead>
							<tr>
								<th>Tipo</th>
								<th>D.O.</th>
								<th>Vendimia</th>
								<th>Suelo</th>
								<th>Localizaci&oacute;n</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div id="DIVproductPreview" data-itemtype="Category" data-itemAddingPage="categoria">
				<h2>Panel de Edici&oacute;n</h2>
				<div>
					<ul>
						<li><a id="ADDbtn" href="agregar_categoria.php">Agregar</a></li>
						<li><a id="EDITbtn" href="javascript:void(0)">Modificar</a></li>
						<!-- <li><a id="DISABLEbtn" href="javascript:void(0)">Deshabilitar</a></li> -->
						<li><a id="DELETEbtn" href="javascript:void(0)">Eliminar</a></li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?PHP include 'template/footer.php'; ?>
	</div>
</body>
</html>