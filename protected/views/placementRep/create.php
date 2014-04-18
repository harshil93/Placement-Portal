<?php
/* @var $this PlacementRepController */
/* @var $model PlacementRep */

$this->breadcrumbs=array(
	'Placement Reps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PlacementRep', 'url'=>array('index')),
	array('label'=>'Manage PlacementRep', 'url'=>array('admin')),
);
?>

<h1>Create PlacementRep</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>