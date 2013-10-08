var selectedElementRow = '';

var setUpForms = function(){
	var form;
	if($('#FORMagregarProducto')[0]){
		//form = $('#FORMagregarProducto');
	}else if($('#FORMagregarCategoria')[0]){
		//form = $('#FORMagregarCategoria');
	}else	if($('#FORMagregarBodega')[0]){
		//form = $('#FORMagregarBodega');
	}
	if(form){
		form.submit(function(event){
			event.preventDefault();
			var formdata = form.serializeArray();
/*
			if($('#FORMagregarProducto')[0]){
				formdata.push({'image':unloadedImage});
			}
*/
			if($(form).validationEngine('validate')){
				$.ajax({
					url:"backend/gestor.php", 
					//dataType: "json",
					//enctype: 'multipart/form-data',
					type: "POST",
					data: formdata, 
					success:function(data){
						alert(data);
						form[0].reset();
					}
				});
			}else{
				return false;
			}
		});
	}
}

var setUpProductList = function(){
	if($('#TABLEproductList')[0]){
		$.ajax({
			url:"backend/gestor.php", 
			dataType: "json", 
			type: "POST", 
			data:{action:'getProductJson'}, 
			success:function(data){
				var tableBody = $('#TABLEproductList tbody');
				var newRow;
				$.each(data.products, function(key, val){
					newRow = $('<tr><td>'+val.nombre+'</td><td>'+val.tipo+'</td><td>'+val.variedad+'</td><td>'+val.anada+'</td><td>'+val.do+'</td><td>'+val.nombre_bodega+'</td><td>¢'+val.precio+'</td></tr>');
					tableBody.append(newRow);
					$(newRow).click(function(){
						val.tableRow = this;
						selectedElementRow = val;
						tableBody.find('tr').removeClass('selected');
						$(this).addClass('selected');
					});
				});
			}
		});
	}
}

var setUpCategoryList = function(){
	if($('#TABLEcategoryList')[0]){
		$.ajax({
			url:"backend/gestor.php", 
			dataType: "json", 
			type: "POST", 
			data:{action:'getCategoriaJson'}, 
			success:function(data){
				var tableBody = $('#TABLEcategoryList tbody');
				var newRow;
				$.each(data.categorias, function(key, val){
					newRow = $('<tr><td>'+val.tipo+'</td><td>'+val.denom+'</td><td>'+val.vendimia+'</td><td>'+val.suelo+'</td><td>'+val.localizacion+'</td></tr>');
					tableBody.append(newRow);
					$(newRow).click(function(){
						val.tableRow = this;
						selectedElementRow = val;
						tableBody.find('tr').removeClass('selected');
						$(this).addClass('selected');
					});
				});
			}
		});
	}
}

var setUpBodegaList = function(){
	if($('#TABLEbodegaList')[0]){
		$.ajax({
			url:"backend/gestor.php", 
			dataType: "json", 
			type: "POST", 
			data:{action:'getBodegaJson'}, 
			success:function(data){
				var tableBody = $('#TABLEbodegaList tbody');
				var newRow;
				$.each(data.bodegas, function(key, val){
				console.log(data);
					newRow = $('<tr><td>'+val.nombre+'</td><td>'+val.ubicacion+'</td><td>'+val.direccion+'</td></tr>');
					tableBody.append(newRow);
					$(newRow).click(function(){
						val.tableRow = this;
						selectedElementRow = val;
						tableBody.find('tr').removeClass('selected');
						$(this).addClass('selected');
					});
				});
			}
		});
	}
}

var setUpEditionPanel = function(){
	if($('#DIVproductPreview')){
		$('#EDITbtn').click(function(){
			if(selectedElementRow!=''){
				window.location.href = "agregar_"+$('#DIVproductPreview').attr("data-itemAddingPage")+".php?id="+selectedElementRow.id;
			}
		});
		$('#DELETEbtn').click(function(){
			if(selectedElementRow!='' && confirm('Está seguro que desea eliminar el item seleccionado?')){
				$.ajax({
					url:"backend/gestor.php", 
					type: "POST", 
					data:{action:'deleteElement', idElemento:selectedElementRow.id, element:$('#DIVproductPreview').attr('data-itemtype')}, 
					success:function(data){
						setTimeout(function(){
							if(data.indexOf('Elemento no eliminado.')==-1){
								$(selectedElementRow.tableRow).remove();
								selectedElementRow = '';
							}
							alert(data);
						}, 500);
					}
				});
			}
		});
	}
}

var init = function(){
	setUpForms();
	setUpProductList();
	setUpBodegaList();
	setUpCategoryList();
	setUpEditionPanel();
}

$(document).ready(function(){
	init();
});





























