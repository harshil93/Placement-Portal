<?php
/* @var $this PlacementRepController */
/* @var $data PlacementRep */
?>

<div class="view">

    <b><?php echo CHtml::encode("Room No."); ?>:</b>
    <?php echo CHtml::encode($data['room_no']); ?>
    <br />

    <b><?php echo CHtml::encode("Start time"); ?>:</b>
    <?php echo CHtml::encode($data['start_time']); ?>
    <br />

    <b><?php echo CHtml::encode("End time"); ?>:</b>
    <?php echo CHtml::encode($data['end_time']); ?>
    <br />

    <b><?php echo CHtml::encode("Company name"); ?>:</b>
    <?php echo CHtml::encode($data['name']); ?>
    <br />

    <b><?php echo CHtml::encode("CTC"); ?>:</b>
    <?php echo CHtml::encode($data['ctc']); ?>
    <br />

    <b><?php echo CHtml::encode("Description"); ?>:</b>
    <?php echo CHtml::encode($data['description']); ?>
    <br />

</div>
