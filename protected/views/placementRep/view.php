<?php
/* @var $this PlacementRepController */
/* @var $model PlacementRep */

$this->breadcrumbs=array(
	$model->name,
);

$this->menu=array(
	array('label'=>'Create PlacementRep', 'url'=>array('create')),
	array('label'=>'Update PlacementRep', 'url'=>array('update', 'pr_id'=>$model->pr_id)),
	array('label'=>'Delete PlacementRep', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pr_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlacementRep', 'url'=>array('admin')),
);
?>

<h1>View PlacementRep #<?php echo $model->pr_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'phone_no',
		'pr_id',
		'dept',
		'programme',
	),
)); ?>
