<?php
/* @var $this ApplyController */
/* @var $model Apply */
/* @var $form CActiveForm */
?>

<div class="form">

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

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

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Apply' : 'Update'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->