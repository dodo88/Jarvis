<div id="list_question">
	<div id="label_list_question">
		<p>List of questions</p>
	</div>
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
//zii.widgets.grid.CGridView

$this->widget('ext.selgridview.SelGridView', array(
	'id'=>'question-grid',
	'dataProvider'=>$model->searchQuestion(),
	'summaryText' => '',
	'cssFile' => Yii::app()->request->baseUrl.'/css/grid.css',
	'selectableRows'=>1,
	'enableHistory'=>true,
	'enableSorting'=>true,
	'ajaxUpdate'=>'question-grid',
	'selectionChanged'=>'updateQuestionForm',
	'columns'=>array(
		'id',
		'name',
		'content',
	),
));
/*

$this->widget('zii.widgets.CListView', array(
        
        'dataProvider'=>$dataProvider,
        'itemView'=>'_test',   // refers to the partial view named '_post'
      
    ));
*/	
?>
</div>
<?php

if(isset($_POST['data']))
	$data = $_POST['data'];
else
	$data=NULL;
?>
<div class="question">
	<div id="label_question_details">
		<p>Question Details</p>
	</div>
	<br/>
	<div id="question_edit_infos">
		<div class="edit_question">
			<input type="button"  id="edit_question"  value="Edit" disabled class="button_edit_question"  /> 
			<input type="button"  id="add_question"  value="Add" class="button_edit_question"  /> 
			<input type="button"  id="delete_question"  value="Delete" class="button_edit_question"  /> 
			<input type="button"  id="cancel_add_question"  value="Cancel" style="display:none" class="button_edit_question" />
			<input type="button"  id="save_add_question"  value="Save" style="display:none" class="button_edit_question"  />
			<input type="button"  id="cancel_edit_question"  value="Cancel" style="display:none" class="button_edit_question" />
			<input type="button"  id="save_edit_question"  value="Save" style="display:none" class="button_edit_question"  />
		</div>
	
		<?php $this->renderPartial('_form', array('data'=>$data)); ?>
	
	</div>

</div>