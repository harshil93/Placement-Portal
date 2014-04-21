<?php
/* @var $this JobProfileController */
/* @var $model JobProfile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'job-profile-_form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ctc'); ?>
		<?php echo $form->textField($model,'ctc'); ?>
		<?php echo $form->error($model,'ctc'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'deadline'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'JobProfile[deadline]',
            'id'=>'JobProfile[deadline]',
            'value'=>Yii::app()->dateFormatter->format("M/d/y",strtotime($model->deadline)),
            'options'=>array(
                'showAnim'=>'fold',
            ),
            'htmlOptions'=>array(
                'style'=>'height:20px;'
            ),
        ));
        ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpi_cutoff'); ?>
		<?php echo $form->textField($model,'cpi_cutoff'); ?>
		<?php echo $form->error($model,'cpi_cutoff'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <?php
    echo CHtml::checkBoxList('checkbox_list_name', '', array(
            'CSE' => 'CSE',
            'MNC' => 'MNC',
            'EEE' => 'EEE',
            'ECE' => 'ECE',
            'CL' => 'CL',
            'CE' => 'CE',
            'EP' => 'EP',
            'BT' => 'BT',
            'DOD' => 'DOD',
            'ME' => 'ME',
            'CST' => 'CST',
            'HSS' => 'HSS'
        ),
        array('id'=>'checkbox-list-id','class'=>'checkboxlist'));
    ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->