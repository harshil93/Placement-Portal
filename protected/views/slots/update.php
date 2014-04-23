<?php
/* @var $this SlotsController */
/* @var $model Slots */

$this->breadcrumbs=array(
	'Slots'=>array('index'),
	$model->slot_id=>array('view','id'=>$model->slot_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Slots', 'url'=>array('index')),
	array('label'=>'Create Slots', 'url'=>array('create')),
	array('label'=>'View Slots', 'url'=>array('view', 'id'=>$model->slot_id)),
	array('label'=>'Manage Slots', 'url'=>array('admin')),
);
?>

<h1>Update Slots <?php echo $model->slot_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>