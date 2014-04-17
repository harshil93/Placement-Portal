<?php
/* @var $this PlacementRepController */
/* @var $model PlacementRep */

$this->breadcrumbs=array(
	'Placement Reps'=>array('index'),
	$model->name=>array('view','id'=>$model->pr_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlacementRep', 'url'=>array('index')),
	array('label'=>'Create PlacementRep', 'url'=>array('create')),
	array('label'=>'View PlacementRep', 'url'=>array('view', 'id'=>$model->pr_id)),
	array('label'=>'Manage PlacementRep', 'url'=>array('admin')),
);
?>

<h1>Update PlacementRep <?php echo $model->pr_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>