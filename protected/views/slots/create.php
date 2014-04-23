<?php
/* @var $this SlotsController */
/* @var $model Slots */

$this->breadcrumbs=array(
	'Slots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Slots', 'url'=>array('index')),
	array('label'=>'Manage Slots', 'url'=>array('admin')),
);
?>

<h1>Create Slots</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>