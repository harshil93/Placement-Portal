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

    <b><?php echo CHtml::encode("details"); ?>:</b>
    <?php echo CHtml::encode($data['details']); ?>
    <br />

    <b><?php echo CHtml::encode("phone_no"); ?>:</b>
    <?php echo CHtml::encode($data['phone_no']); ?>
    <br />

    <b><?php echo CHtml::encode("email_id"); ?>:</b>
    <?php echo CHtml::encode($data['email_id']); ?>


</div>
