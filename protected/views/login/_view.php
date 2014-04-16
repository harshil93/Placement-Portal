<?php
/* @var $this LoginController */
/* @var $data Login */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->email_id), array('view', 'id'=>$data->email_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />


</div>