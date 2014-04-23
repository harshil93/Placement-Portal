<?php
/* @var $this SlotsController */
/* @var $model Slots */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slots-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'slot_id'); ?>
		<?php echo $form->textField($model,'slot_id'); ?>
		<?php echo $form->error($model,'slot_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_no'); ?>
		<?php echo $form->textField($model,'room_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'room_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
		<?php echo $form->error($model,'end_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->