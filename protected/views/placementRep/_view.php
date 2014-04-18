<?php
/* @var $this PlacementRepController */
/* @var $data PlacementRep */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pr_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pr_id), array('view', 'pr_id'=>$data->pr_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_no')); ?>:</b>
	<?php echo CHtml::encode($data->phone_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dept')); ?>:</b>
	<?php echo CHtml::encode($data->dept); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programme')); ?>:</b>
	<?php echo CHtml::encode($data->programme); ?>
	<br />


</div>