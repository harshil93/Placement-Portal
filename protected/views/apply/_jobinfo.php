<?php
/* @var $this PlacementRepController */
/* @var $data PlacementRep */
?>


<div class="view">

    <b><?php echo CHtml::encode("ctc"); ?>:</b>
    <?php echo CHtml::encode($data["ctc"]);  ?>
    <br />

    <b><?php echo CHtml::encode("cpi_cutoff"); ?>:</b>
    <?php echo CHtml::encode($data["cpi_cutoff"]);?>
    <br />

    <b><?php echo CHtml::encode("description"); ?>:</b>
    <?php echo CHtml::encode($data["description"]);?>
    <br />

    <b><?php echo CHtml::encode("deadline"); ?>:</b>
    <?php echo CHtml::encode($data["deadline"]);?>
    <br />

</div>

