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
function updateQuestionForm() {
	if($.fn.yiiGridView.getSelection('question-grid') =="")
	{
		$("#edit_question").attr('disabled', 'disabled');
		$("#delete_question").attr('disabled', 'disabled');
		$("#name").val("");
		$("#question_content").val("");
		$("#answer_1").val("");
		$("#answer_2").val("");
		$("#answer_3").val("");
		$("#answer_4").val("");
	} 
	else
	{
		var id =  $.fn.yiiGridView.getSelection('question-grid');
		datap = "id="+id;
		var aUrl = 'index.php?r=question/indexPartial';
		
		$.ajax({
				url: aUrl,
				data: datap,
				type:'POST',
				success: function(data){
						// what i do on success?
						$('.form_question').replaceWith(data);
						$("#edit_question").removeAttr("disabled");
						$("#delete_question").removeAttr("disabled");
					},
				error: function(){
						// what i do on error=?
						alert(" We have an error ");
					}});
	}
};

$(document).ready(function() {
	resetCursor($("#content"));
	my_dialog = $('<div id="contenu"><p> Are you sure that you want to validate this question?</div>').dialog({

		draggable: false,
		width: '800px',
		modal: true,
		position: ["center", "center"],
		autoOpen: false,
		resizable: false,
		buttons: {
        Ok: function() {
				$( this ).dialog( "close" );
				$("#edit_question").attr('disabled', 'disabled');
				var id =  $.fn.yiiGridView.getSelection('question-grid');
				datap = "id="+id;
				var aUrl = 'index.php?r=approveProject/validateProject';
				$.ajax({
						url: aUrl,
						data: datap,
						type:'POST',
						success: function(data){
							// what i do on success?
							$("#question_id").val("");
							$("#date_submit").val("");
							$("#what_question").val("");
							$("#where_question").val("");
							$("#when_question").val("");
							$("#client_name").val("");
							$("#client_phone").val("");
							$("#client_email").val("");
							$("#admin_note").val("");
							$.fn.yiiGridView.update('question-grid', {data: $(this).serialize() });
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
	

$('#edit_question').bind('click', function() {
	$("#save_edit_question").show("slow");
	$("#cancel_edit_question").show("slow");
	$("#edit_question").hide("slow");
	$("#delete_question").hide("slow");
	$("#add_question").hide("slow");
	$("#name").removeAttr("disabled");
	$("#question_content").removeAttr("disabled");
	$("#answer_1").removeAttr("disabled");
	$("#answer_2").removeAttr("disabled");
	$("#answer_3").removeAttr("disabled");
	$("#answer_4").removeAttr("disabled");
	$("#question-grid").children().bind('click', function(){ return false; });
});

$('#add_question').bind('click', function() {
	$("#save_add_question").show("slow");
	$("#cancel_add_question").show("slow");
	$("#edit_question").hide("slow");
	$("#add_question").hide("slow");
	$("#delete_question").hide("slow");
	$("#name").removeAttr("disabled");
	$("#question_content").removeAttr("disabled");
	$("#answer_1").removeAttr("disabled");
	$("#answer_2").removeAttr("disabled");
	$("#answer_3").removeAttr("disabled");
	$("#answer_4").removeAttr("disabled");
	$("#name").val("");
	$("#question_content").val("");
	$("#answer_1").val("");
	$("#answer_2").val("");
	$("#answer_3").val("");
	$("#answer_4").val("");
	$("#question-grid").children().bind('click', function(){ return false; });
});

$('#delete_question').bind('click', function() {
	$("#edit_question").attr('disabled', 'disabled');
	$("#delete_question").attr('disabled', 'disabled');
	$("#name").attr('disabled', 'disabled');
	$("#question_content").attr('disabled', 'disabled');
	$("#answer_1").attr('disabled', 'disabled');
	$("#answer_2").attr('disabled', 'disabled');
	$("#answer_3").attr('disabled', 'disabled');
	$("#answer_4").attr('disabled', 'disabled');
	$("#name").val("");
	$("#question_content").val("");
	$("#answer_1").val("");
	$("#answer_2").val("");
	$("#answer_3").val("");
	$("#answer_4").val("");
	var id =  $.fn.yiiGridView.getSelection('question-grid');
	datap = "id="+id;
	var aUrl = 'index.php?r=question/deleteQuestion';
	$.ajax({
				url: aUrl,
				data: datap,
				type:'POST',
				success: function(data){
						// what i do on success?
						$.fn.yiiGridView.update('question-grid', {data: $(this).serialize() })
					},
				error: function(){
						// what i do on error=?
						alert(" We have an error ");
					}});
});

$('#cancel_add_question').bind('click', function() {
	$("#save_add_question").hide("slow");
	$("#cancel_add_question").hide("slow");
	$("#edit_question").show("slow");
	$("#add_question").show("slow");
	$("#delete_question").show("slow");
	$("#question-grid").children().unbind('click');
	if($.fn.yiiGridView.getSelection('question-grid') =="")
	{
		$("#edit_question").attr('disabled', 'disabled');
		$("#delete_question").attr('disabled', 'disabled');
		$("#name").attr('disabled', 'disabled');
		$("#question_content").attr('disabled', 'disabled');
		$("#answer_1").attr('disabled', 'disabled');
		$("#answer_2").attr('disabled', 'disabled');
		$("#answer_3").attr('disabled', 'disabled');
		$("#answer_4").attr('disabled', 'disabled');
		$("#name").val("");
		$("#question_content").val("");
		$("#answer_1").val("");
		$("#answer_2").val("");
		$("#answer_3").val("");
		$("#answer_4").val("");
	}
	else
	{
		var id =  $.fn.yiiGridView.getSelection('question-grid');
		datap = "id="+id;
		var aUrl = 'index.php?r=question/indexPartial';
		$.ajax({
				url: aUrl,
				data: datap,
				type:'POST',
				success: function(data){
						// what i do on success?
						$('.form_question').replaceWith(data);
					},
				error: function(){
						// what i do on error=?
						alert(" We have an error ");
					}});
	}
});

$('#save_add_question').bind('click', function() {
	$("#save_add_question").hide("slow");
	$("#cancel_add_question").hide("slow");
	$("#edit_question").show("slow");
	$("#add_question").show("slow");
	$("#delete_question").show("slow");
	$("#question-grid").children().unbind('click');
	var datap = "&name="+$("#name").val() +"&content="+$("#question_content").val()+"&answer_1="+$("#answer_1").val()+"&answer_2="+$("#answer_2").val()+"&answer_3="+$("#answer_3").val()+"&answer_4="+$("#answer_4").val();	
	var aUrl = 'index.php?r=question/createQuestion';
	$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$("#name").attr('disabled', 'disabled');
					$("#question_content").attr('disabled', 'disabled');
					$("#answer_1").attr('disabled', 'disabled');
					$("#answer_2").attr('disabled', 'disabled');
					$("#answer_3").attr('disabled', 'disabled');
					$("#answer_4").attr('disabled', 'disabled');
					$("#name").val("");
					$("#question_content").val("");
					$("#answer_1").val("");
					$("#answer_2").val("");
					$("#answer_3").val("");
					$("#answer_4").val("");
					$.fn.yiiGridView.update('question-grid', {data: $(this).serialize() });
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
});

$('#valid_question').bind('click', function() {
	my_dialog.dialog("open");
	/*
	$("#edit_question").attr('disabled', 'disabled');
	$("#valid_question").attr('disabled', 'disabled');
	var id =  $.fn.yiiGridView.getSelection('question-grid');
	datap = "id="+id;
	var aUrl = 'index.php?r=approveProject/validateProject';
	$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$("#question_id").val("");
					$("#date_submit").val("");
					$("#what_question").val("");
					$("#where_question").val("");
					$("#when_question").val("");
					$("#client_name").val("");
					$("#client_phone").val("");
					$("#client_email").val("");
					$("#admin_note").val("");
					$.fn.yiiGridView.update('question-grid', {data: $(this).serialize() })
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
	*/
});

$('#cancel_edit_question').bind('click', function() {
	$("#save_edit_question").hide("slow");
	$("#cancel_edit_question").hide("slow");
	$("#edit_question").show("slow");
	$("#add_question").show("slow");
	$("#delete_question").show("slow");
	$("#question-grid").children().unbind('click');
	var id =  $.fn.yiiGridView.getSelection('question-grid');
	datap = "id="+id;
	var aUrl = 'index.php?r=question/indexPartial';
	$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$('.form_question').replaceWith(data);
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
});

$('#save_edit_question').bind('click', function() {
	$("#save_edit_question").hide("slow");
	$("#cancel_edit_question").hide("slow");
	$("#edit_question").show("slow");
	$("#add_question").show("slow");
	$("#delete_question").show("slow");
	$("#question-grid").children().unbind('click');
	var id =  $.fn.yiiGridView.getSelection('question-grid');
	var datap = "id="+id+"&name="+$("#name").val() +"&content="+$("#question_content").val()+"&answer_1="+$("#answer_1").val()+"&answer_2="+$("#answer_2").val()+"&answer_3="+$("#answer_3").val()+"&answer_4="+$("#answer_4").val();	
	var aUrl = 'index.php?r=question/editPartial';
	$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$("#name").attr('disabled', 'disabled');
					$("#question_content").attr('disabled', 'disabled');
					$("#answer_1").attr('disabled', 'disabled');
					$("#answer_2").attr('disabled', 'disabled');
					$("#answer_3").attr('disabled', 'disabled');
					$("#answer_4").attr('disabled', 'disabled');
					$.fn.yiiGridView.update('question-grid', {data: $(this).serialize() })
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
					
});

$('#radio1').bind('click', function() {
	if ($('#radio1').attr("checked") != "undefined" && $('#radio1').attr("checked") == "checked")
	{
		$("#save_template").removeAttr("disabled");
		var datap = "id="+1;	
		var aUrl = 'index.php?r=email/getTemplate';
		$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$(".form_template").replaceWith(data);
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
	}
});

$('#radio2').bind('click', function() {
	if ($('#radio2').attr("checked") != "undefined" && $('#radio2').attr("checked") == "checked")
	{
		$("#save_template").removeAttr("disabled");
		var datap = "id="+2;	
		var aUrl = 'index.php?r=email/getTemplate';
		$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$(".form_template").replaceWith(data);
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
	}
});

$('#get_info').bind('click', function() {
	var datap = "question_name="+$("#question_name").val() +"&date_from="+$("#date_from").val()+"&date_to="+$("#date_to").val();	
	
	var aUrl = 'index.php?r=report/getDetails';
		$.ajax({
			url: aUrl,
			data: datap,
			type:'POST',
			success: function(data){
					// what i do on success?
					$(".form_info").replaceWith(data);
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
});

/*
$('#save_template').bind('click', function() {
	if (($('#radio2').attr("checked") != "undefined" && $('#radio2').attr("checked") == "checked") || ($('#radio1').attr("checked") != "undefined" && $('#radio1').attr("checked") == "checked"))
	{
		var aUrl = 'index.php?r=email/saveTemplate';
		$.ajax({
			url: aUrl,
			data: $("#email_template").serialize(),
			type:'POST',
			success: function(data){
					// what i do on success?
					$(".form_template").replaceWith(data);
				},
			error: function(){
                    // what i do on error=?
					alert(" We have an error ");
                }});
	}
});
*/
//$('.star').rating();

$(".star-rating-live").bind('click', function() {
	var numItems = $('.star-rating-on').length;
	$('#Last').attr('value',numItems);
});


});
