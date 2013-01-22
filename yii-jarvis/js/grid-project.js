function resetCursor(txtElement) { 
    if (txtElement.setSelectionRange) { 
        txtElement.focus(); 
        txtElement.setSelectionRange(0, 0); 
    } else if (txtElement.createTextRange) { 
        var range = txtElement.createTextRange();  
        range.moveStart('character', 0); 
        range.select(); 
    } 
};
function updateProjectForm() {
	if($.fn.yiiGridView.getSelection('project-grid') =="")
	{
		$("#edit_project").attr('disabled', 'disabled');
		$("#valid_project").attr('disabled', 'disabled');
		$("#project_id").val("");
		$("#date_submit").val("");
		$("#what_project").val("");
		$("#where_project").val("");
		$("#when_project").val("");
		$("#client_name").val("");
		$("#client_phone").val("");
		$("#client_email").val("");
		$("#admin_note").val("");
	
	} 
	else
	{
		var id =  $.fn.yiiGridView.getSelection('project-grid');
		datap = "id="+id;
		var aUrl = 'index.php?r=approveProject/indexPartial';
		$("#edit_project").removeAttr("disabled");
		$("#valid_project").removeAttr("disabled");
		$.ajax({
				url: aUrl,
				data: datap,
				type:'POST',
				success: function(data){
						// what i do on success?
						$('.form_project').replaceWith(data);
					},
				error: function(){
						// what i do on error=?
						alert(" We have an error ");
					}});
	}
};

$(document).ready(function() {
	resetCursor($("#what_project"));
	resetCursor($("#admin_note"));
	my_dialog = $('<div id="contenu"><p> Are you sure that you want to validate this project?</div>').dialog({

		draggable: false,
		width: '800px',
		modal: true,
		position: ["center", "center"],
		autoOpen: false,
		resizable: false,
		buttons: {
        Ok: function() {
				$( this ).dialog( "close" );
				$("#edit_project").attr('disabled', 'disabled');
				$("#valid_project").attr('disabled', 'disabled');
				var id =  $.fn.yiiGridView.getSelection('project-grid');
				datap = "id="+id;
				var aUrl = 'index.php?r=approveProject/validateProject';
				$.ajax({
						url: aUrl,
						data: datap,
						type:'POST',
						success: function(data){
							// what i do on success?
							$("#project_id").val("");
							$("#date_submit").val("");
							$("#what_project").val("");
							$("#where_project").val("");
							$("#when_project").val("");
							$("#client_name").val("");
							$("#client_phone").val("");
							$("#client_email").val("");
							$("#admin_note").val("");
							$.fn.yiiGridView.update('project-grid', {data: $(this).serialize() });
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
					
			},
		Cancel: function() {
          $( this ).dialog( "close" );
		  
			}
		},
	});
	

$('#edit_project').bind('click', function() {
	$("#save_edit_project").show("slow");
	$("#cancel_edit_project").show("slow");
	$("#edit_project").hide("slow");
	$("#valid_project").hide("slow");
	$("#project_id").css('background','#5C9CCC url(http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/redmond/images/ui-bg_gloss-wave_55_5c9ccc_500x100.png) 50% 50% repeat-x');
	$("#date_submit").css('background','#5C9CCC url(http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/redmond/images/ui-bg_gloss-wave_55_5c9ccc_500x100.png) 50% 50% repeat-x');
	$("#what_project").removeAttr("disabled");
	$("#where_project").removeAttr("disabled");
	$("#when_project").removeAttr("disabled");
	$("#client_name").removeAttr("disabled");
	$("#client_phone").removeAttr("disabled");
	$("#client_email").removeAttr("disabled");
	$("#admin_note").removeAttr("disabled");
	$("#project-grid").children().bind('click', function(){ return false; });
});

$('#valid_project').bind('click', function() {
	my_dialog.dialog("open");
	/*
	$("#edit_project").attr('disabled', 'disabled');
	$("#valid_project").attr('disabled', 'disabled');
	var id =  $.fn.yiiGridView.getSelection('project-grid');
	datap = "id="+id;
	var aUrl = 'index.php?r=approveProject/validateProject';
	$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$("#project_id").val("");
					$("#date_submit").val("");
					$("#what_project").val("");
					$("#where_project").val("");
					$("#when_project").val("");
					$("#client_name").val("");
					$("#client_phone").val("");
					$("#client_email").val("");
					$("#admin_note").val("");
					$.fn.yiiGridView.update('project-grid', {data: $(this).serialize() })
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
	*/
});

$('#cancel_edit_project').bind('click', function() {
	$("#save_edit_project").hide("slow");
	$("#cancel_edit_project").hide("slow");
	$("#edit_project").show("slow");
	$("#valid_project").show("slow");
	$("#project-grid").children().unbind('click');
	var id =  $.fn.yiiGridView.getSelection('project-grid');
	datap = "id="+id;
	var aUrl = 'index.php?r=approveProject/indexPartial';
	$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$('.form_project').replaceWith(data);
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
});

$('#save_edit_project').bind('click', function() {
	$("#save_edit_project").hide("slow");
	$("#cancel_edit_project").hide("slow");
	$("#edit_project").show("slow");
	$("#valid_project").show("slow");
	$("#project-grid").children().unbind('click');
	var datap = "id="+$("#project_id").val()+"&what_project="+$("#what_project").val() +"&when_project="+$("#when_project").val()+"&where_project="+$("#where_project").val()
				+"&client_name="+$("#client_name").val()+"&client_phone="+$("#client_phone").val()+"&client_email="+$("#client_email").val()
				+"&admin_note="+$("#admin_note").val()+"&date_submit="+$("#date_submit").val();
	
	var aUrl = 'index.php?r=approveProject/editPartial';
	$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$("#what_project").attr('disabled', 'disabled');
					$("#where_project").attr('disabled', 'disabled');
					$("#when_project").attr('disabled', 'disabled');
					$("#client_name").attr('disabled', 'disabled');
					$("#client_phone").attr('disabled', 'disabled');
					$("#client_email").attr('disabled', 'disabled');
					$("#admin_note").attr('disabled', 'disabled');
					$("#project_id").css('background','#DFEFFC url(http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/redmond/images/ui-bg_glass_85_dfeffc_1x400.png) 50% 50% repeat-x');
					$("#date_submit").css('background','#DFEFFC url(http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/redmond/images/ui-bg_glass_85_dfeffc_1x400.png) 50% 50% repeat-x');
					$.fn.yiiGridView.update('project-grid', {data: $(this).serialize() })
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
					
});

});
