$(document).ready(function(){
$("#languageSwitcher").change(function(){ 

	var locale = $(this).val();
	var _token = $('meta[name="csrf-token"]').attr('content');
	var data = '_token='+ _token+'&locale='+locale;
	//alert (data);
	$.ajax({
		
		type: 'POST',
		url: 'language',
		data: data,
		datatype:'json',
		success: function(data){
			//alert(data);

		},
		error: function(data){

		},
		beforeSend:function(){

		},
		complete: function(data){
			window.location.reload(true);

		}

	 }); 

});
});


 