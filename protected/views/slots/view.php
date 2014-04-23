<?php
/* @var $this SlotsController */
/* @var $model Slots */

$this->breadcrumbs=array(
	'Slots'=>array('index'),
	$model->slot_id,
);

$this->menu=array(
	array('label'=>'List Slots', 'url'=>array('index')),
	array('label'=>'Create Slots', 'url'=>array('create')),
	array('label'=>'Update Slots', 'url'=>array('update', 'id'=>$model->slot_id)),
	array('label'=>'Delete Slots', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->slot_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Slots', 'url'=>array('admin')),
);
?>

<h1>View Slots #<?php echo $model->slot_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'slot_id',
		'room_no',
		'start_time',
		'end_time',
	),
)); ?>
