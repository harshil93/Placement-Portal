<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'job-profile-_form-form',
        'action'=>Yii::app()->createUrl('//apply/save',array("j_id"=>$j_id, "c_id"=>$c_id)),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation'=>false,
    )); ?>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_jobinfo',
)); ?>


<h3> Select CV</h3>
<?php
echo CHtml::RadioButtonList('cv_id', '', $cv_list,
    array('id'=>'cv_id','class'=>'checkboxlist'));
?>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->



