<?php
/* @var $this PlacementRepController */
/* @var $data PlacementRep */
?>

<div class="view">

    <b><?php echo CHtml::encode("cv"); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data['cv']), array('student/view', 'c_id'=>$data['cv'])); ?>
    <br />

    <b><?php echo CHtml::encode("cv_name"); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data['cv_name']), array('view', 'j_id'=>$data['cv_name'])); ?>
    <br />
</div>

