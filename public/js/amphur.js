$(document).ready(function(){
	
	$("#province").change(function(){
		var province = $(this).children("option:selected").val();
		var amphur = $('#amphur');
		$.ajax({
			type: "GET",
			url: "/getamphur",
			cache: false,
			data: "id="+province,
			success: function(response){
				
				$('#amphur').find('option').remove().end();
				
				$.each(response,function(key, value) 
				{
					$('#amphur').append('<option value="' + value["AMPHUR_ID"] + '">'+ value["AMPHUR_NAME"] +'</option>');
				});
			}
		});

	});

});