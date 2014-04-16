<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('st_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->st_id), array('view', 'id'=>$data->st_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roll_no')); ?>:</b>
	<?php echo CHtml::encode($data->roll_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpi')); ?>:</b>
	<?php echo CHtml::encode($data->cpi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dept')); ?>:</b>
	<?php echo CHtml::encode($data->dept); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programme')); ?>:</b>
	<?php echo CHtml::encode($data->programme); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_no')); ?>:</b>
	<?php echo CHtml::encode($data->phone_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_address')); ?>:</b>
	<?php echo CHtml::encode($data->current_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_address')); ?>:</b>
	<?php echo CHtml::encode($data->home_address); ?>
	<br />

	*/ ?>

</div>