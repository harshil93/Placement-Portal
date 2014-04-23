<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'student-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>true,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($modelLogin);  ?>
    <br>
    <?php echo $form->errorSummary($modelStudent);  ?>
    <div class="row">
        <?php echo $form->labelEx($modelLogin,'email_id'); ?>
        <?php echo $form->textField($modelLogin,'email_id',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($modelLogin,'email_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelLogin,'password'); ?>
        <?php echo $form->passwordField($modelLogin,'password',array('size'=>32,'maxlength'=>32)); ?>
        <?php echo $form->error($modelLogin,'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'roll_no'); ?>
        <?php echo $form->textField($modelStudent,'roll_no'); ?>
        <?php echo $form->error($modelStudent,'roll_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'name'); ?>
        <?php echo $form->textField($modelStudent,'name',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($modelStudent,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'gender'); ?>
        <?php echo CHtml::dropDownList('Student[gender]', "M",
            $modelStudent->getgenderOptions(),
            array('empty' => 'Select a gender'));
        ?>
        <?php echo $form->error($modelStudent,'gender'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'cpi'); ?>
        <?php echo $form->textField($modelStudent,'cpi',array('size'=>3,'maxlength'=>3)); ?>
        <?php echo $form->error($modelStudent,'cpi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'dept'); ?>
        <?php echo CHtml::dropDownList('Student[dept]', "",
            $modelStudent->getDeptOptions(),
            array());
        ?>
        <?php echo $form->error($modelStudent,'dept'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'programme'); ?>
        <?php echo CHtml::dropDownList('Student[programme]', "",
            $modelStudent->getProgrammeOptions(),
            array());
        ?>
        <?php echo $form->error($modelStudent,'programme'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'category'); ?>
        <?php echo CHtml::dropDownList('Student[category]', "",
            $modelStudent->getCategoryOptions(),
            array());
        ?>
        <?php echo $form->error($modelStudent,'category'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'phone_no'); ?>
        <?php echo $form->textField($modelStudent,'phone_no',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($modelStudent,'phone_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'current_address'); ?>
        <?php echo $form->textField($modelStudent,'current_address',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($modelStudent,'current_address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelStudent,'home_address'); ?>
        <?php echo $form->textField($modelStudent,'home_address',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($modelStudent,'home_address'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->