<?php
/* @var $this PlacementRepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Placement Reps',
);

/*$this->menu=array(
	array('label'=>'Update Details', 'url'=>array('update', 'id'=>$model->pr_id)),
	array('label'=>'View Placement Reps', 'url'=>array('viewAll')),
);*/
?>


<h1>Placement Reps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider1,
	'itemView'=>'_reviewJobInfoPart',
)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider2,
	'itemView'=>'_reviewCVPart',
)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider3,
	'itemView'=>'_commentView',
)); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'action'=>Yii::app()->createUrl('//placementRep/afterPost', array("st_id"=>$st_id, "c_id"=>$c_id, "j_id"=>$j_id, "pr_id"=>$pr_id)),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'txt'); ?>
		<?php echo $form->textField($model,'txt'); ?>
		<?php echo $form->error($model,'txt'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
