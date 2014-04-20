<?php
/* @var $this PlacementRepController */
/* @var $data PlacementRep */
?>

<div class="view">
    <b><?php echo CHtml::encode("st_id"); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data['st_id']),array('student/view', 'id'=>$data['st_id'])); ?>
    <br />

    <b><?php echo CHtml::encode("roll_no"); ?>:</b>
    <?php echo CHtml::encode($data['roll_no']); ?>
    <br />

    <b><?php echo CHtml::encode("Student name"); ?>:</b>
    <?php echo CHtml::encode($data['name']); ?>
    <br />

    <b><?php echo CHtml::encode("c_id"); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data['c_id']),array('viewCompDetails', 'c_id'=>$data['c_id'])); ?>
    <br />

    <b><?php echo CHtml::encode("Company name"); ?>:</b>
    <?php echo CHtml::encode($data['cname']); ?>
    <br />

    <b><?php echo CHtml::encode("j_id"); ?>:</b>
    <?php echo CHtml::encode($data['j_id']); ?>
    <br />

    <b><?php echo CHtml::encode("Job description"); ?>:</b>
    <?php echo CHtml::encode($data['description']); ?>
    <br />

    <b><?php echo CHtml::encode("ctc"); ?>:</b>
    <?php echo CHtml::encode($data['ctc']); ?>
    <br />

    <b><?php echo CHtml::encode("Joining Date"); ?>:</b>
    <?php echo CHtml::encode($data['joining_date']); ?>
    <br />

    <b><?php echo CHtml::encode("PPO"); ?>:</b>
    <?php echo CHtml::encode($data['ppo']); ?>
    <br />

    <b><?php echo CHtml::encode("Location"); ?>:</b>
    <?php echo CHtml::encode($data['location']); ?>
    <br />

    <b><?php echo CHtml::encode("Offer deadline"); ?>:</b>
    <?php echo CHtml::encode($data['offer_deadline']); ?>
    <br />

    <b><?php echo CHtml::encode("Accepted"); ?>:</b>
    <?php echo CHtml::encode($data['accepted']); ?>
    <br />




</div>

