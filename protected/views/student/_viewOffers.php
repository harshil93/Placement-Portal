<?php
/* @var $this PlacementRepController */
/* @var $data PlacementRep */
?>

<div class="view">

    <b><?php echo CHtml::encode("c_id"); ?>:</b>
    <?php echo CHtml::encode($data['c_id']); ?>
    <br />

    <b><?php echo CHtml::encode("name"); ?>:</b>
    <?php echo CHtml::encode($data['name']); ?>
    <br />

    <b><?php echo CHtml::encode("details"); ?>:</b>
    <?php echo CHtml::encode($data['details']); ?>
    <br />

    <b><?php echo CHtml::encode("email_id"); ?>:</b>
    <?php echo CHtml::encode($data['email_id']); ?>
    <br />

    <b><?php echo CHtml::encode("phone_no"); ?>:</b>
    <?php echo CHtml::encode($data['phone_no']); ?>
    <br />

    <b><?php echo CHtml::encode("j_id"); ?>:</b>
    <?php echo CHtml::encode($data['j_id']); ?>
    <br />

    <b><?php echo CHtml::encode("ctc"); ?>:</b>
    <?php echo CHtml::encode($data['ctc']); ?>
    <br />

    <b><?php echo CHtml::encode("cpi_cutoff"); ?>:</b>
    <?php echo CHtml::encode($data['cpi_cutoff']); ?>
    <br />

    <b><?php echo CHtml::encode("description"); ?>:</b>
    <?php echo CHtml::encode($data['description']); ?>
    <br />

    <b><?php echo CHtml::encode("approved"); ?>:</b>
    <?php echo CHtml::encode($data['approved']); ?>
    <br />

    <b><?php echo CHtml::encode("PPO"); ?>:</b>
    <?php echo CHtml::encode($data['ppo']); ?>
    <br />

    <b><?php echo CHtml::encode("deadline"); ?>:</b>
    <?php echo CHtml::encode($data['deadline']); ?>
    <br />

    <b><?php echo CHtml::encode("tstamp"); ?>:</b>
    <?php echo CHtml::encode($data['tstamp']); ?>
    <br />

    <b><?php
        echo CHtml::link(CHtml::encode("Accept"), array('offers/accept', 'j_id'=>$data['j_id'] , 'c_id'=>$data['c_id']));
        ?></b>


</div>

