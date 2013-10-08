var validateForm = function(){
	if(!$('#FORMcontacto')) return false;
	var form = $('#FORMcontacto');
	form.submit(function(){
		form.validationEngine('validate');
	}, false);
}

var startSlider = function(){
	if(!$('#DIVslider')) return false;
	$("#DIVslider > div:gt(0)").hide();
	setInterval(function() {$('#DIVslider > div:first').fadeOut(1000).next().fadeIn(1000).end().appendTo('#DIVslider');},5000);
}

var init = function(){
	validateForm();
	startSlider();
}

$(function(){
	init();
})