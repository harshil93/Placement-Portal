<?php
/* @var $this PlacementRepController */
/* @var $data PlacementRep */
?>

<div class="view">

    <b><?php echo CHtml::encode("slot_id"); ?>:</b>
    <?php echo CHtml::encode($data['slot_id']); ?>
    <br />

    <b><?php echo CHtml::encode("Start time"); ?>:</b>
    <?php echo CHtml::encode($data['start_time']); ?>
    <br />

    <b><?php echo CHtml::encode("End time"); ?>:</b>
    <?php echo CHtml::encode($data['end_time']); ?>
    <br />

    <b><?php
        echo CHtml::link(CHtml::encode("Allot this"), array('slots/allotJobSlots','slot_id'=> $data['slot_id'], 'j_id'=>$_GET['j_id'] , 'c_id'=>$_GET['c_id']));
    ?></b>
</div>
