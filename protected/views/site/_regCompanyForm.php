<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'company-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>true,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($modelLogin);  ?>
    <br>
    <?php echo $form->errorSummary($modelCompany);  ?>
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
        <?php echo $form->labelEx($modelCompany,'name'); ?>
        <?php echo $form->textField($modelCompany,'name',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($modelCompany,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelCompany,'details'); ?>
        <?php echo $form->textField($modelCompany,'details',array('size'=>60,'maxlength'=>1000)); ?>
        <?php echo $form->error($modelCompany,'details'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelCompany,'phone_no'); ?>
        <?php echo $form->textField($modelCompany,'phone_no',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($modelCompany,'phone_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelCompany,'email_id'); ?>
        <?php echo $form->textField($modelCompany,'email_id',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($modelCompany,'email_id'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->