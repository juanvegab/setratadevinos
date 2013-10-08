$(function(){

	var Wine = Backbone.Model.extend({
		defaults:{
			
		}
		
		
		
	});



	var AppRouter = Backbone.Router.extend({
		el:'#DIVcontent',
		routes: { "":"index","appointments/:id": "show" },
		
		initialize: function(options){
			this.appointmentList = options.appointmentList;
			this.appointmentList.fetch();
		},
		
		index: function(){
			var appointmentsView = new AppointmentListView({collection: this.appointmentList});
			appointmentsView.render();
			$("#DIVcontent").html(appointmentsView.el);
		},
		
		show: function(id){
			var appointment = new Appointment({id: id});
			var appointmentView = new AppointmentView({model: appointment});
			appointmentView.render(); 
			$('#DIVcontent').html(appointmentView.el);
			appointment.fetch();
		}
	});
});