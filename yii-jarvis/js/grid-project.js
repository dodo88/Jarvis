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
$('#edit_project').bind('click', function() {
	$("#save_edit_project").show("slow");
	$("#cancel_edit_project").show("slow");
	$("#edit_project").hide("slow");
	$("#valid_project").hide("slow");
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
					$.fn.yiiGridView.update('project-grid', {data: $(this).serialize() })
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
					
});

});
