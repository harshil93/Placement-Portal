<?php
/* @var $this PlacementRepController */
/* @var $model PlacementRep */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_no'); ?>
		<?php echo $form->textField($model,'phone_no',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pr_id'); ?>
		<?php echo $form->textField($model,'pr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dept'); ?>
		<?php echo $form->textField($model,'dept',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'programme'); ?>
		<?php echo $form->textField($model,'programme',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->