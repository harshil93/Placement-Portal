<?php
/* @var $this PlacementRepController */
/* @var $data PlacementRep */
?>

<div class="view">
	<b><?php echo CHtml::encode("pr_id"); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data['pr_id'])); ?>
	<br />

	<b><?php echo CHtml::encode("timestamp"); ?>:</b>
	<?php echo CHtml::encode($data['tstamp']); ?>
	<br />

	<b><?php echo CHtml::encode("PR Name:"); ?>:</b>
	<?php echo CHtml::encode($data['name']); ?>
	<br />

	<b><?php echo CHtml::encode("Comment:"); ?>:</b>
	<?php echo CHtml::encode($data['txt']); ?>
	<br />

	


</div>

