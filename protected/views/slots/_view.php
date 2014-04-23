<?php
/* @var $this SlotsController */
/* @var $data Slots */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('slot_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->slot_id), array('view', 'id'=>$data->slot_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_no')); ?>:</b>
	<?php echo CHtml::encode($data->room_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_time')); ?>:</b>
	<?php echo CHtml::encode($data->end_time); ?>
	<br />


</div>