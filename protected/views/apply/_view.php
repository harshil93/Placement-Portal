<?php
/* @var $this PlacementRepController */
/* @var $data PlacementRep */
?>

<div class="view">

	<b><?php echo CHtml::encode("st_id"); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data['st_id']), array('student/view', 'id'=>$data['st_id'])); ?>
	<br />

	<b><?php echo CHtml::encode("c_id"); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data['c_id']), array('student/view', 'c_id'=>$data['c_id'])); ?>
	<br />

	<b><?php echo CHtml::encode("j_id"); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data['j_id']), array('view', 'j_id'=>$data['j_id'])); ?>
	<br />

	<b><?php echo CHtml::encode("description"); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data['description']), array('view', 'description'=>$data['description'])); ?>
	<br />

	

</div>

