<?php
/* @var $this PlacementRepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Placement Reps',
);

$this->menu=array(
	array('label'=>'Create PlacementRep', 'url'=>array('create')),
	array('label'=>'Manage PlacementRep', 'url'=>array('admin')),
);
?>

<h1>Placement Reps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
