<?php
/* @var $this PlacementRepController */
/* @var $model PlacementRep */

$this->breadcrumbs=array(
	'Create',
);

$this->menu=array(
	array('label'=>'Manage PlacementRep', 'url'=>array('admin')),
);
?>

<h1>Create PlacementRep</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>