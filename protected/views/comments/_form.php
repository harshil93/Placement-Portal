<?php
/* @var $this CommentsController */
/* @var $model Comments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'comment_id'); ?>
		<?php echo $form->textField($model,'comment_id'); ?>
		<?php echo $form->error($model,'comment_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'txt'); ?>
		<?php echo $form->textField($model,'txt',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'txt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'st_id'); ?>
		<?php echo $form->textField($model,'st_id'); ?>
		<?php echo $form->error($model,'st_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_id'); ?>
		<?php echo $form->textField($model,'c_id'); ?>
		<?php echo $form->error($model,'c_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'j_id'); ?>
		<?php echo $form->textField($model,'j_id'); ?>
		<?php echo $form->error($model,'j_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pr_id'); ?>
		<?php echo $form->textField($model,'pr_id'); ?>
		<?php echo $form->error($model,'pr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tstamp'); ?>
		<?php echo $form->textField($model,'tstamp'); ?>
		<?php echo $form->error($model,'tstamp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->