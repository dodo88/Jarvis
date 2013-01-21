<div id="list_project">
<div id="label_list_project">
	<p>List of projects to be approved </p>
</div>
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
//zii.widgets.grid.CGridView

$this->widget('ext.selgridview.SelGridView', array(
	'id'=>'project-grid',
	'dataProvider'=>$model->searchNonApproved(),
	'summaryText' => '',
	'cssFile' => Yii::app()->request->baseUrl.'/css/grid.css',
	'selectableRows'=>1,
	'enableHistory'=>true,
	'enableSorting'=>true,
	'ajaxUpdate'=>'project-grid',
	'selectionChanged'=>'updateProjectForm',
	'columns'=>array(
		'project_id',
		'what_project',
		'where_project',
		'when_project',
		'date_submit',
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
<div class="project">
 <div class="edit_project">
	<input type="button"  id="edit_project"  value="Edit" disabled class="button_edit_project"  /> 
	<input type="button"  id="cancel_edit_project"  value="Cancel" style="display:none" class="button_edit_project" />
	<input type="button"  id="save_edit_project"  value="Save" style="display:none" class="button_edit_project"  />
</div>
<?php $this->renderPartial('_form', array('data'=>$data)); ?>
 <div class="valid_project">
	<input type="button"  id="valid_project"  value="Validate" disabled class="button_valid_project"/> 
</div>

</div>