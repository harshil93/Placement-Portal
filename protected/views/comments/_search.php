<?php
/* @var $this CommentsController */
/* @var $model Comments */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'comment_id'); ?>
		<?php echo $form->textField($model,'comment_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'txt'); ?>
		<?php echo $form->textField($model,'txt',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'st_id'); ?>
		<?php echo $form->textField($model,'st_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_id'); ?>
		<?php echo $form->textField($model,'c_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'j_id'); ?>
		<?php echo $form->textField($model,'j_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pr_id'); ?>
		<?php echo $form->textField($model,'pr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tstamp'); ?>
		<?php echo $form->textField($model,'tstamp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->