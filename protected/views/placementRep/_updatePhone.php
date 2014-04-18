<?php
/* @var $this PlacementRepController */
/* @var $model PlacementRep */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'placement-rep-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50, 'readonly'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_no'); ?>
		<?php echo $form->textField($model,'phone_no',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'phone_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pr_id'); ?>
		<?php echo $form->textField($model,'pr_id', array('readonly'=>true)); ?>
		<?php echo $form->error($model,'pr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dept'); ?>
		<?php echo $form->textField($model,'dept',array('size'=>3,'maxlength'=>3, 'readonly'=>true)); ?>
		<?php echo $form->error($model,'dept'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'programme'); ?>
		<?php echo $form->textField($model,'programme',array('size'=>5,'maxlength'=>5, 'readonly'=>true)); ?>
		<?php echo $form->error($model,'programme'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->