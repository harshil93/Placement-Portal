<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'roll_no'); ?>
		<?php echo $form->textField($model,'roll_no'); ?>
		<?php echo $form->error($model,'roll_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpi'); ?>
		<?php echo $form->textField($model,'cpi',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'cpi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dept'); ?>
		<?php echo $form->textField($model,'dept',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'dept'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'programme'); ?>
		<?php echo $form->textField($model,'programme',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'programme'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_no'); ?>
		<?php echo $form->textField($model,'phone_no',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'phone_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_address'); ?>
		<?php echo $form->textField($model,'current_address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'current_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'home_address'); ?>
		<?php echo $form->textField($model,'home_address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'home_address'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->