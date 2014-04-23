<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'pr-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>true,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($modelLogin);  ?>
    <br>
    <?php echo $form->errorSummary($modelPR);  ?>
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
        <?php echo $form->labelEx($modelPR,'name'); ?>
        <?php echo $form->textField($modelPR,'name',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($modelPR,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelPR,'phone_no'); ?>
        <?php echo $form->textField($modelPR,'phone_no',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($modelPR,'phone_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelPR,'dept'); ?>
        <?php echo $form->textField($modelPR,'dept',array('size'=>3,'maxlength'=>3)); ?>
        <?php echo $form->error($modelPR,'dept'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelPR,'programme'); ?>
        <?php echo $form->textField($modelPR,'programme',array('size'=>5,'maxlength'=>5)); ?>
        <?php echo $form->error($modelPR,'programme'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->