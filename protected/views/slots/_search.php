<?php
/* @var $this SlotsController */
/* @var $model Slots */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'slot_id'); ?>
		<?php echo $form->textField($model,'slot_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_no'); ?>
		<?php echo $form->textField($model,'room_no',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_time'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->