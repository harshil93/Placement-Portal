

<div class="view">

    <b><?php echo CHtml::encode("Job ID"); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data['j_id']), array('jobProfile/view', 'j_id'=>$data['j_id'],'c_id'=> Yii::app()->user->id)); ?>
    <br />


    <b><?php echo CHtml::encode("Job ID"); ?>:</b>
    <?php echo CHtml::encode($data['j_id']); ?>
    <br />

    <b><?php echo CHtml::encode("CTC"); ?>:</b>
    <?php echo CHtml::encode($data['ctc']); ?>
    <br />

    <b><?php echo CHtml::encode("DEADLINE"); ?>:</b>
    <?php echo CHtml::encode($data['deadline']); ?>
    <br />


</div>