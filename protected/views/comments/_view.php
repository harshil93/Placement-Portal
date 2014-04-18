<?php
/* @var $this CommentsController */
/* @var $data Comments */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->comment_id), array('view', 'id'=>$data->comment_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('txt')); ?>:</b>
	<?php echo CHtml::encode($data->txt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('st_id')); ?>:</b>
	<?php echo CHtml::encode($data->st_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_id')); ?>:</b>
	<?php echo CHtml::encode($data->c_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('j_id')); ?>:</b>
	<?php echo CHtml::encode($data->j_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pr_id')); ?>:</b>
	<?php echo CHtml::encode($data->pr_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tstamp')); ?>:</b>
	<?php echo CHtml::encode($data->tstamp); ?>
	<br />


</div>