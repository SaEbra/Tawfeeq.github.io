
 $(document).ready(function(){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var genderId;

 	//$('.ajax').on('submit',function(){
	$(".save1").on('click',function(){	
	//var that=$(this),
	var that=$('.block1'),
	//type=that.attr('method'),
	//url =that.attr('action'),
	data={};
	var Exit=0;
	that.find('[name]').not(':input[type="radio"]').each(function(index,value){
		var that=$(this),
			name=that.attr('name'),
			value=that.val(),
			required=that.prop('required');
			
			if(value == '' && that.prop('required',true) )
			{   
				$('#alert-warning-save1').show(); 
				Exit=1;
				return false;

			}
			data[name]=value;
			
	});	
	
	if(Exit==0)  
	{
		that.find('input:checked').each(function(index,value){
		var that=$(this),
			name=that.attr('name'),
			value=that.val();
			data[name]=value;
			 
		});	
		//console.log(data);
		//var csrf_token = $('meta[name="csrf-token"]').attr('content');
		data['_token']=csrf_token;

 		$.ajax({
	        type: 'POST',
	        url: 'saveMember',
	        data: data,
			success: function( msg ) 
				{ 
					console.log(msg);
					genderId=msg;
					//console.log(genderId);
				}
		});

 		var sumbitbuttton=that.find("input[type='submit']" );
	
		//sumbitbuttton.hide();
		//sumbitbuttton.prev().hide();
		//sumbitbuttton.next().show();
		$('#alert-warning-save1').hide(); 
		var sumbitbuttton=that.find("input[type='submit']" );
		sumbitbuttton.prev().remove();
		that.append("<input type='button' class='next action-button' value="+next+" />	");
		sumbitbuttton.remove();
	}
 	return false;
	});
	 
 
	$(".save2").on('click',function(){

		var that=$('.block2'),
			data={};
		var Exit=0;		
		that.find('[name]').not(':input[type="checkbox"]').each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				/*
				if(name=='sicknessCase' && value=='' && data['healthId']!='1')
				{ 
					$('#alert-warning-save2').show(); 
					Exit =1;
					return false;
				} 
				*/
				if(name=='specialNeedCase' && value=='' && data['specialNeedId']!='1')
				{
					$('#alert-warning-save2').show(); 
					Exit =1;
					return false;
				}
				data[name]=value;
		});	

		var j=0, healthArr={};
		var chronicIllnessCase= $('#chronicIllnessCase').val();
		var inheritedIllnessCase= $('#inheritedIllnessCase').val();
		var distortionCase= $('#distortionCase').val();
		that.find("input[name='healthId[]']:checked").each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				if(value=='2' && (chronicIllnessCase=='') )
					Exit=1;
				if(value=='3' && (inheritedIllnessCase=='') )
					Exit=1;
				if(value=='4' && (distortionCase=='') )
					Exit=1;
				healthArr[j]=value;
				j++;
				
		}); 

		if( (Object.keys(healthArr).length==0) || Exit==1)
		{
			$('#alert-warning-save2').show(); 
			return false;
		}
		if (Exit==0)
		{
			data['healthArr']=healthArr;		
			//var csrf_token = $('meta[name="csrf-token"]').attr('content');
			data['_token']=csrf_token;
			console.log(data);
			$.ajax({
				type: 'POST',
				url: 'saveMember',
				data: data,
				success: function( msg ) 
					{ 
						console.log(msg);
					}
			});
			
			$('#alert-warning-save2').hide(); 
			var sumbitbuttton=that.find("input[type='submit']" );
			sumbitbuttton.prev().remove();
			sumbitbuttton.remove();
			that.append("<input type='button' class='next action-button' value="+next+" />	");
			
		} 
		return false;
	});
 
	$(".save3").on('click',function(){
		var that=$('.block3'),
		data={}; 
		that.find('[name]').not(':input[type="checkbox"]').each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				data[name]=value;
		});	

		var j=0, partnerWeightArr={};
		that.find("input[name='partnerWeightId[]']:checked").each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				partnerWeightArr[j]=value;
				j++;
				
		});
		
		var j=0, partnerHairTypeArr={};
		that.find("input[name='partnerHairTypeId[]']:checked").each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				partnerHairTypeArr[j]=value;
				j++;
				
		}); 
		
		var j=0, partnerSkinColorArr={};
		that.find("input[name='partnerSkinColorId[]']:checked").each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				partnerSkinColorArr[j]=value;
				j++;
				
		}); 

		
		if((Object.keys(partnerWeightArr).length==0) || (Object.keys(partnerHairTypeArr).length==0) ||  (Object.keys(partnerSkinColorArr).length==0) )
		{
			$('#alert-warning-save3').show(); 
			return false;
		}
		else
		{
			data['partnerWeightArr']=partnerWeightArr;
			data['partnerSkinColorArr']=partnerSkinColorArr;
			data['partnerHairTypeArr']=partnerHairTypeArr;	
			data['_token']=csrf_token;
			//console.log(data);
			//console.log(genderId);
			
			$.ajax({
					type: 'POST',
					url: 'saveMember',
					data: data ,
					success: function( msg ) 
						{ 
							//console.log(msg); 
						}
			});
			
			$('#alert-warning-save3').hide(); 
			var sumbitbuttton=that.find("input[type='submit']" );
			sumbitbuttton.prev().remove();
			sumbitbuttton.remove();
			that.append("<input type='button' class='next action-button' value="+next+" />	"); 
			
		}
		return false;
	});
 

	$(".save4").on('click',function(){
		var that=$('.block4'),
		data={};
		that.find('[name]').not(':input[type="checkbox"]').each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				data[name]=value;
		});	

		var j=0, partnerBeautyArr={};
		that.find("input[name='partnerBeautyId[]']:checked").each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				partnerBeautyArr[j]=value;
				j++;
				
		}); 

		if(Object.keys(partnerBeautyArr).length==0)
		{
			$('#alert-warning-save4').show(); 
			return false;
		}
		
		data['partnerBeautyArr']=partnerBeautyArr;
		data['_token']=csrf_token;
		//console.log(data);
		
		$.ajax({
				type: 'POST',
				url: 'saveMember',
				data: data,
				success: function( msg ) 
					{ 
						console.log(msg);
					}
		});
        $('#alert-warning-save4').hide(); 
		var sumbitbuttton=that.find("input[type='submit']" );
		sumbitbuttton.prev().remove();
		sumbitbuttton.remove();
		that.append("<input type='button' class='next action-button' value="+next+" />	"); 

		return false;
	});


	$(".save5Woman").on('click',function(){
		var data={};
		var that=$('.block5:not(.male)');
		//console.log(that);
		var Exit=0;
		that.find('[name]').each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				
				if(name=='womanDivorceReason' && value=='' && data['womanMaritalStatusId']==3 )
				{   //alert(name+"//"+value);
					Exit=1;
					return false;

				}
				else
				data[name]=value;
		});	
		
		if(Exit==1)
		{
			$('#alert-warning-save5').show(); 
			return false;
		}
		data['_token']=csrf_token;
		//console.log(data);
		
		$.ajax({
				type: 'POST',
				url: 'saveMember',
				data: data,
				success: function( msg ) 
					{ 
						console.log(msg);
					}
		});
		
		
		
		
		$(".save5Woman").prev().hide();	
		$(".save5Woman").hide();

		$('#alert-warning-save5').hide(); 
		$('#alert-warning-save5').parent().append("<input type='button' class='next action-button' value="+next+" />	");
		
		return false;
	});

$(".save6").on('click',function(){
	var data={};
 	var Exit=0;
	var that=$('.block5:not(.female)');
	that.find('[name]').each(function(index,value){
		var that=$(this),
			name=that.attr('name'),
			value=that.val();
			if(value=='' && name=='manDivorceReason' && data['manMaritalStatusId']==3 )
			{    
 				Exit=1;
				return false;

			}
			if(value=='' && name=='secondWifeReason' && data['manMaritalStatusId']==4 )
			{    
				
				Exit=1;
				return false;

			}
			data[name]=value;
	});	
	
	if (Exit==1)
	{
		$('#alert-warning-save6').show(); 
		return false;  
	}
	
	var j=0, partnerHijabArr={};
	that.find("input[name='partnerHijabId[]']:checked").each(function(index,value){
		var that=$(this),
			value=that.val();
			partnerHijabArr[j]=value;
			j++;		 
		}); 

	var j=0, partnerWomanMaritalStatusArr={};
	that.find("input[name='partnerWomanMaritalStatusId[]']:checked").each(function(index,value){
		var that=$(this),
			value=that.val();
			partnerWomanMaritalStatusArr[j]=value;
			j++;		 
		}); 

	if( (Object.keys(partnerHijabArr).length==0) || (Object.keys(partnerWomanMaritalStatusArr).length==0)  )
	{
		$('#alert-warning-save6').show(); 
		return false;
	}
	
	data['partnerHijabArr']=partnerHijabArr;
	data['partnerWomanMaritalStatusArr']=partnerWomanMaritalStatusArr;
	data['_token']=csrf_token;
	//console.log(data);
	$.ajax({
	        type: 'POST',
	        url: 'saveMember',
	        data: data,
			success: function( msg ) 
				{ 
					console.log(msg);
				 }
	});
	$('#alert-warning-save6').hide(); 
	var sumbitbuttton=that.find("input[type='submit']" );
	sumbitbuttton.prev().remove();
	sumbitbuttton.remove();
	//that.append("<input type='button' class='next action-button' value="+next+"1 />	");
	$('#alert-warning-save6').parent().append("<input type='button' class='next action-button' value="+next+" />	");

		

	return false;
});



	/// get cities

	$("#residentCountryId").change(function(){
		$('#residentCityId>option').closest('option').remove();
		var countryId = $(this).val();
		var data={};
		data['countryId']=countryId;
		data['_token']=csrf_token;
		//alert(countryId);
		//console.log(country_id);
		
		$.ajax({
	        type: 'POST',
	        url: 'getCities',
	        data: data,
			success: function( msg ) 
				{ 
					//console.log(msg);
					for (var i = 0; i < msg.length; i++) {
						var myObject = msg[i];
						$('#residentCityId').append("<option value="+myObject['city_id']+">"+myObject['name']+"</option>" );
					}  					
				}
		}); 
		
	});
 
	$("#partnerResidentCountryId").change(function(){
		$('#partnerResidentCityId>option').closest('option.addOption').remove();
		var countryId = $(this).val();
		var data={};
		data['countryId']=countryId;
		data['_token']=csrf_token;
		
		$.ajax({
	        type: 'POST',
	        url: 'getCities',
	        data: data,
			success: function( msg ) 
				{ 
					for (var i = 0; i < msg.length; i++) {
						var myObject = msg[i];
						$('#partnerResidentCityId').prepend("<option value="+myObject['city_id']+" class='addOption'>"+myObject['name']+"</option>" );
					}  					
				}
		}); 
		
	});


	
	// select
	//$('.hiddenInput').hide();
	$(".select").change(function(){ //alert("dd");
		//$(this).closest("input").css({"color": "red", "border": "2px solid red"});
		var selectId = $(this).val();
		if(selectId!= 1)
			$(this).next('.hiddenInput').show();
		else
			$(this).next('.hiddenInput').hide();

	});

	$( ".checkbox " ).each(function() {
		var numberOfCheckedAll  =$(this).find('label,.isSelected').filter(':checked').length;
		//alert(numberOfCheckedAll)
		if(numberOfCheckedAll>=3)
			{ 
				$(this).find( "label,.isSelected" ).filter(':not(:checked)').attr('disabled',true);
			}
			if(numberOfCheckedAll<3)
			{
				$(this).find( "label,.isSelected" ).filter(':not(:checked)').attr('disabled',false);
			}
	});	


	// checkbox 3
	$(".checkbox").change(function(){ 
		var numberOfChecked  = $(this).find( "label,.isSelected" ).filter(':checked').length;
		if(numberOfChecked>=3)
		{ 
			$(this).find( "label,.isSelected" ).filter(':not(:checked)').attr('disabled',true);
		}
		if(numberOfChecked<3)
		{
			$(this).find( "label,.isSelected" ).filter(':not(:checked)').attr('disabled',false);
		}
	});

	// 
	$(".womanMaritalStatus").change(function(){
		var status = $(this).val();
		if(status==1 || status==2){
			$(this).nextAll( ".divorceSection").eq(0).hide();
			$(this).nextAll( ".childrenSection").eq(0).hide();
			
 		}
		if(status==3){
			$(this).nextAll( ".divorceSection").eq(0).show();
			$(this).nextAll( ".childrenSection").eq(0).show();
 		}
		if(status==4){
			$(this).nextAll( ".divorceSection").eq(0).hide();
			$(this).nextAll( ".childrenSection").eq(0).show();
		}
	});

	$(".womanMaritalStatusUpdate").change(function(){
		var status = $(this).val();
		//alert(status);
		if(status==1 || status==2){
			$('.divorceSection').hide();
			$('.childrenSection').hide();
 		}
		if(status==3){
			$('.divorceSection').show();
			$('.childrenSection').show();
 		}
		if(status==4){
			$('.divorceSection').hide();
			$('.childrenSection').show();
		}	
	});		
		
	$(".manMaritalStatus").change(function(){
		var status = $(this).val();
		$(this).nextAll( ".divorceSection").eq(0).hide();
		$(this).nextAll( ".childrenSection").eq(0).hide();
		$(this).nextAll( "#wivesNumber").eq(0).hide();
		//alert(status);
		if(status==2 ){	
			$(this).nextAll( ".childrenSection").eq(0).show();
		 }
		if(status==3){
			$(this).nextAll( ".divorceSection").eq(0).show();
			$(this).nextAll( ".childrenSection").eq(0).show();
		 }
		 if(status==4){
			$(this).nextAll( "#wivesNumber").eq(0).show();
 		}
	});

	$(".manMaritalStatusUpdate").change(function(){
		var status = $(this).val();
		$( ".divorceSection").hide();
		$( ".childrenSection").hide();
		$( "#wivesNumber").hide();
		//alert(status);
		if(status==2 ){	
			$( ".childrenSection").show();
		 }
		if(status==3){
			$( ".divorceSection").show();
			$( ".childrenSection").show();
		 }
		 if(status==4){
			$( "#wivesNumber").show();
			$( ".childrenSection").show();
 		}
	});
	

	$("#partnerManMaritalStatus").change(function(){
		var status = $('#partnerManMaritalStatus').val();
		//alert(status);
		if(status!=1){
			$('#manChildren').show();
		} else
			$('#manChildren').hide();
			 
	
	});
	
	

    /// childrenNumber

	$("#womanChildrenNumber").change(function(){
		// remove the old
		$('.womanChildrenTableTr').hide();
		$('#womanChildrenTable>thead').closest('thead').remove();
		//$('#womenChildrenTable>tbody').closest('tbody').remove();
		var rows = $('#womanChildrenNumber').val();
		if(rows>0)
		{
			var tHead = "<thead><tr id='childrenThead'><th></th><th>العمر</th><th>الجنس</th></tr></thead><tbody>";
			$('#womanChildrenTable').append(tHead);
		} 
		for (var i = 1; i <= rows; i++) { 
			$("#womanChildrenTableTr"+i).show();
		} 
		
	});
    //checeked number
	$(".numberOnly").keypress(function (e) {
		//if the letter is not digit then display error and don't type anything
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		   //display error message
		   //$(this).next('.numberOnly.errmsg').html("Digits Only").show().fadeOut("slow");
		   $(this).next().filter('.errmsg').html("Digits Only").show().fadeOut("slow");
				  return false;
	   }
	});  

	$("#manChildrenNumber").change(function(){
		// remove the old
		$('.manChildrenTableTr').hide();
		$('#manChildrenTable>thead').closest('thead').remove();
		var rows = $('#manChildrenNumber').val();
		if(rows>0)
		{
			var tHead = "<thead><tr id='childrenThead'><th></th><th>العمر</th><th>الجنس</th></tr></thead><tbody>";
			$('#manChildrenTable').append(tHead);
		} 
		for (var i = 1; i <= rows; i++) { 
			$("#manChildrenTableTr"+i).show();
		} 
		
	});
	 


	//manMarriedWives
	$("#manMaritalStatusId").change(function(){
		var status = $('#manMaritalStatusId').val();
		alert(status);
		if(status==4)
		{
			$('#wivesNumber').show();
		}	else
		{
			$('#wivesNumber').hide();
		}
		
	});
	
    $('#ChooseFMale').click(function(){
		
		if(genderId==1)
			{
				$('fieldset#FirstFieldMale').show();
				$('fieldset#FirstFieldFemale').remove();
				$('fieldset.female').remove();
				
			}
			
		elseif(genderId==2)	
		{
			$('fieldset#FirstFieldFemale').show();
			$('fieldset#FirstFieldMale').hide();
			$('fieldset.male').hide();
			
		}
			
	}); 





	// صفحة اسئلة عامة
	 
	$(".formSumbit").submit(function(){ 
		var that=$('.formSumbit'),

		type=that.attr('method'),
		url =that.attr('action'),
		data={};
		//previous next submit
		/*
		 that.find('[name]').each(function(index,value){
			var that=$(this),
				name=that.attr('name'),
				value=that.val();
				data[name]=value;
		});	*/
		data=that.serialize();
		//data['_token']=csrf_token;
		data+='&_token='+csrf_token;
		//console.log(data);
		$.ajax({
	        type: type,
	        url:  url,
	        data: data,
			success: function( msg ) 
				{ 
					//console.log(msg); 
					//alert(msg);
					if(msg=='Done')
					{
						$(".alert-success").show();
						$(".alert-danger").hide();
					}
					else
					{
						$(".alert-danger").show();
						$(".alert-success").hide();
						
					}
					
					
				}
		});
		return false;

	});

	// رفع الصور
	var selectedFile;
	$("#file").on('change', function(e){
		//Get file
		selectedFile = e.target.files[0];
	}); 
	 
	$("#uploadFileForm").submit(function(){
		
		//var fileName = selectedFile.name;
		var ID = $("#ID").val();
 
		if(typeof($("#amount").val()) != "undefined" && ($("#amount").val()) !== null) {
			if(($("#amount").val()) == null)
				return false;
			
			var amount = $("#amount").val();
			//alert(ID); alert(amount);
			
			firebase.database().ref('paymentNotification').push({
				ID: ID,
				amount: amount
				}).catch(function(error) {
					console.error('Error writing new message to Realtime Database:', error);
				}); 
		 
		}
		else
			var storageRef = firebase.storage().ref('membersImages/profilePhoto' + ID);

		
		
		var uploadTask=storageRef.put(selectedFile);

		uploadTask.on('state_changed', function(snapshot){
		}, function(error) {
		// Handle unsuccessful uploads
		}, function() {
		uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
			//console.log('File available at', downloadURL);
			$(".alert-success").show();
			
            var user = firebase.auth().currentUser;
            user.updateProfile({
                displayName: ID,
                photoURL: downloadURL
              }).then(function() {
                // Update successful.
                console.log('Update successful');
              }).catch(function(error) {
                // An error happened.
                console.log('An error happened.');
              });
            

		});
		});

		
		return false;
		

	});

 
		
	
	$("#interstedInButton").on('click', function(){
		var matchListID=$(this).data("value"),
		data={};
		//alert(valmatchListID);
		data['matchListID']=matchListID;
		data['_token']=csrf_token;
		console.log(data); 
		$.ajax({
	        type: 'Post',
	        url:  '/interestedIn',
	        data: data,
			success: function( msg ) 
				{ 
					console.log(msg); 
				}
		});
		return false;
	});

	
	
    // load chat history
    $.ajax({
		method: 'GET',
		url: 'chatHistory',
		data: {},
		success: function( response ){
			//console.log( response);
			//$("#list-friends").children("li").remove();
			for( var i=0; i<response.length;i++)
			{  
				var m,status='';
				//status="<div class='status on'>online</div>";
			  	//console.log( response[i]['partnerUserID']); 
			  	$("#list-friends").append("<li><img width='50' height='50' src="+m+" id="+response[i]['partnerUserID']+"><div class='info'><a class='chatPart' href='#' id='"+response[i]['thread']+"'><div class='user'>"+response[i]['partnerUserID']+"</a></div>"+status+"</div></li>"); 
			  	getPartnerPhoto( response[i]['partnerUserID'],response[i]['partnerUserID']);
			  
			}
			//console.log( response.partnerUserID);
			//console.log( response.partnerUserPhotoUrl );
			
			
		},
		error: function( e ) {
			console.log(e);
		}
	  });

});

